<script type="text/javascript">
	$(document).ready(function() {
		$('#list-jadwal').DataTable({
			
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