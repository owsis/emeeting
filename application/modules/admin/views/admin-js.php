<script type="text/javascript">
  (function($) {
    'use strict';

    var data_nunker = "<?=site_url('admin/search_ruangan/?')?>"

    $('#nunker').autocomplete({
      source: data_nunker,
      select: function (event, ui) {
        $('input[name=nunker]').val(ui.item.nunker);
        $('input[name=kunker]').val(ui.item.kunker);
      },
      response: function (event, ui) {
        if(ui.content.length === 0){
          console.log('No results loaded!');
        }else{
          console.log('success!');
        }
      }
      
    });

    $('input[name=nunker-edit]').autocomplete({
      source: data_nunker,
      select: function (event, ui) {
        $('input[name=nunker-edit]').val(ui.item.nunker);
        $('input[name=kunker]').val(ui.item.kunker);
      },
      response: function (event, ui) {
        if(ui.content.length === 0){
          console.log('No results loaded!');
        }else{
          console.log('success!');
        }
      }
      
    });

    $(function() {
      $('.file-upload-browse').on('click', function() {
        var file = $(this).parent().parent().parent().find('.file-upload-default');
        file.trigger('click');
      });
      $('.file-upload-default').on('change', function() {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
      });
    });

    
  })(jQuery);

</script>