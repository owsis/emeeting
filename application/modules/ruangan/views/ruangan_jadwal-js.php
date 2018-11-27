<script type="text/javascript">

	$(function () {
		$('#datetimepicker1').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
		});
	});

	$(function () {
		$('#datetimepicker2').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
		});
	});

	$(function () {
		$('#datetimepicker3').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
		});
	});

	$(function () {
		$('#datetimepicker4').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
		});
	});


	$(document).ready(function() {

		var data_js = <?php echo $get_data ?>;

		$('#calendar').fullCalendar({
			lang: 'id',
			themeSystem: 'bootstrap4',
			contentHeight: 450,
			header: {
				left: 'today, prev,next',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',
			},
			editable: true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {

				if( start.isBefore( moment() ) ) {

					$('#calendar').fullCalendar('unselect');
					return false;

				}

				$('#create_modal').modal('show');
				$('#create_modal input[name=start]').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#create_modal input[name=end]').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#calendar').fullCalendar('unselect');
				
			},
			events: data_js,
			eventLimit: true,
			eventClick: function(event, element) {
				$('#edit_modal').modal('show');
				document.getElementById('form_update').action = "<?=site_url('ruangan/jadwal_update/')?>" + event.id;
				$('#edit_modal input[name=id]').val(event.id);
				$('#edit_modal input[name=nip]').val(event.nip);
				$('#edit_modal input[name=code_r]').val(event.code_r);
				$('#edit_modal input[name=title]').val(event.title);
				document.getElementById("desc").value = event.description;
				$('#edit_modal input[name=start]').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
				$('#edit_modal input[name=end]').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
				$('#edit_modal select[name=color]').val(event.color);
			}
		});

	});

	

</script>