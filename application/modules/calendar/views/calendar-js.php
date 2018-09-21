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


	$(document).ready(function() {

		var data_js = <?php echo $get_data ?>;

		$('#calendar').fullCalendar({
			lang: 'id',
			themeSystem: 'bootstrap4',
			header: {
				left: 'month,agendaWeek,agendaDay',
				center: 'title',
				right: 'today, prev,next',
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
				save();
				$('#calendar').fullCalendar('unselect');
				
			},
			events: data_js,
			eventClick: function(event, element) {

			}
		});

	});

	

</script>