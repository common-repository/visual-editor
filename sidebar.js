(function (plugins, editPost, element, components, data, compose) {
    const el = element.createElement;
    const { __ } = wp.i18n;
    const { Fragment } = element;
    const { registerPlugin } = plugins;
    const { PluginSidebar, PluginSidebarMoreMenuItem } = editPost;
    const { PanelBody } = components;
    const visualeditorShow = visualeditorShowOptions(element, components, data, compose);
    const visualeditorNameShow = visualeditorNameOption(element, components, data, compose);
	const visualeditorRightMouverShow = visualeditorRightMouverOption(element, components, data, compose);
	const visualeditorBlurShow = visualeditorBlurOption(element, components, data, compose);
    const visualeditorStyle = visualeditorStyleOption(element, components, data, compose);
    const visualeditorsColorOption = visualeditorColorOption(element, components, data, compose);
	const visualeditorsMouverColorOption = visualeditorMouverColorOption(element, components, data, compose);
	const visualeditorToolbarScaleOption = visualeditorsToolbarScaleOption(element, components, data, compose);
    registerPlugin('gutenberg-visual-editor', {
        render: function () {
            return el(
                Fragment,
                {},
                el(
                    PluginSidebarMoreMenuItem,
                    {
                        target: 'gutenberg-visual-editor',
                        icon: visualeditorIcon,
                    },
                    'Gutenberg Visual'
                ),

                el(
                    PluginSidebar,
                    {
                        name: 'gutenberg-visual-editor',
                        icon: visualeditorIcon,
                        title: 'Gutenberg Visual Editor',
                    },
                    el(
                        PanelBody,
                        {},
                        el('h2', {}, 'Show Guideline?'),
                        el(visualeditorShow, {
                            metaKey: '_ve_enable_guideline',
                        }),
                        el('h2', {}, ''),
                        el(visualeditorNameShow, {
                            metaKey: '_ve_show_name',
                        }),
						el('h2', {}, ''),
                        el(visualeditorBlurShow, {
                            metaKey: '_ve_show_blur',
                        }),
                        el('h2', {}, 'Color Guideline, Toolbar and Sidebar'),
                        el(visualeditorsColorOption, {
                            metaKey: '_ve_color_guideline',
                        }),
                        el('h2', {}, 'Guideline Style'),
                        el(visualeditorStyle, {
                            metaKey: '_ve_style_guideline',
                        }),
						el('h2', {}, 'Toolbar Scale'),
                        el(visualeditorToolbarScaleOption, {
                            metaKey: '_ve_toolbar_scale',
                        }),
						el('h2', {}, 'Color Mouver'),
                        el(visualeditorsMouverColorOption, {
                            metaKey: '_ve_color_mouver',
                        }),
						el('h2', {}, ''),
                        el(visualeditorRightMouverShow, {
                            metaKey: '_ve_show_rightmouver',
                        })
                    )
                )
            );
        },
    });
})(wp.plugins, wp.editPost, wp.element, wp.components, wp.data, wp.compose);
