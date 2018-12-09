<script type="text/javascript">
	(function($) {
		'use strict';
		$(function() {
			$('.file-upload-browse').on('click', function() {
				var file = $(this).parent().parent().parent().find('.file-upload-default');
				file.trigger('click');
			});
			$('#upload-absensi').on('change', function() {
				$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
				// alert(this.files[0].size);
				if (this.files[0].size > 2048000) {
					document.getElementById("size-file-absensi").style.visibility = "visible";
					document.getElementById("submitAbsensi").classList.remove('btn-success');
					document.getElementById("submitAbsensi").classList.add('btn-secondary');
					document.getElementById("submitAbsensi").style.display = "none";
				} else {
					document.getElementById("size-file-absensi").style.visibility = "hidden";
					document.getElementById("submitAbsensi").classList.remove('btn-secondary');
					document.getElementById("submitAbsensi").classList.add('btn-success');
					document.getElementById("submitAbsensi").style.display = "";
				}
			});
			$('#upload-rapat').on('change', function() {
				$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
				// alert(this.files[0].size);
				if (this.files[0].size > 2048000) {
					document.getElementById("size-file-rapat").style.visibility = "visible";
					document.getElementById("submitRapat").classList.remove('btn-success');
					document.getElementById("submitRapat").classList.add('btn-secondary');
					document.getElementById("submitRapat").style.display = "none";
				} else {
					document.getElementById("size-file-rapat").style.visibility = "hidden";
					document.getElementById("submitRapat").classList.remove('btn-secondary');
					document.getElementById("submitRapat").classList.add('btn-success');
					document.getElementById("submitRapat").style.display = "";
				}
			});
		});
	})(jQuery);
	
	$(document).ready(function() {
		$('#dashboard-jadwal').DataTable({
			
			"scrollX": true,
			"language": {
				"lengthMenu": "Tampilkan _MENU_ data per halaman",
				"zeroRecords": "Tidak ditemukan jadwal",
				"info": "Halaman _PAGE_ dari _PAGES_",
				"infoEmpty": "Tidak ada data jadwal",
				"infoFiltered": "(Filter dari _MAX_ total data)"
			}
		});
	});
</script>