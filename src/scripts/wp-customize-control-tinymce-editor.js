jQuery( document ).ready(function($) {
    $('.customize-control-tinymce-editor').each(function(){
        // Get the toolbar strings that were passed from the PHP Class
        var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('id')].intinymcetoolbar1;
        var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('id')].intinymcetoolbar2;

        wp.editor.initialize( $(this).attr('id'), {
            tinymce: {
                wpautop: false,
                tadv_noautop: false,
                verify_html: true,
                cleanup_on_startup: false,
                cleanup: false,
                validate_children: false,
                toolbar1: tinyMCEToolbar1String,
                toolbar2: tinyMCEToolbar2String
            },
            quicktags: false
        });
    });
    $(document).on( 'tinymce-editor-init', function( event, editor ) {
        editor.on('change', function(e) {
            tinyMCE.triggerSave();
            $('#'+editor.id).trigger('change');
        });
    });
});
