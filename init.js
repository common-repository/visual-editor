(function ($) {
    $(document).ready(function () {
        const body = $('body');
        body.attr('show-guideline', visualeditorUserOptions.show_guideline);
        body.attr('show-name-block', visualeditorUserOptions.show_name_block);
		body.attr('show-rightmouver-block', visualeditorUserOptions.show_rightmouver_block);


        document.documentElement.style.setProperty('--guideline-color', visualeditorUserOptions.guideline_color);
		document.documentElement.style.setProperty('--mouver-color', visualeditorUserOptions.mouver_color);


        const c = jQuery.Color(visualeditorUserOptions.guideline_color);
        const lightness = c.lightness();
        let color = '#000000';
        if (lightness < 0.5) color = '#ffffff';

        document.documentElement.style.setProperty('--guideline-style', visualeditorUserOptions.guideline_style);
		document.documentElement.style.setProperty('--toolbar-scale', visualeditorUserOptions.toolbar_scale);
    });
})(jQuery);

 window.onload = function() {
        const isEditorSidebarOpened = wp.data.select( 'core/edit-post' ).isEditorSidebarOpened();
        if ( ! isEditorSidebarOpened ) {
          wp.data.dispatch( 'core/edit-post' ).openGeneralSidebar('edit-post/document');
        }
      };
      
      jQuery(document).on('click', '.wp-block', function() {
        wp.data.dispatch( 'core/edit-post' ).openGeneralSidebar('edit-post/block');
     });
     
     jQuery(document).on('click', '.dashicons-trash', function() {
      
	    const block_ids = wp.data.select('core/block-editor').getSelectedBlockClientIds();
	    wp.data.dispatch( 'core/block-editor' ).removeBlocks(block_ids);
       
     });

    jQuery(document).on('click', '.dashicons-welcome-add-page', function() {
      
	    const block_ids = wp.data.select('core/block-editor').getSelectedBlockClientIds();
	    wp.data.dispatch( 'core/block-editor' ).duplicateBlocks(block_ids);
       
     });