function visualeditorsToolbarScaleOption(element, components, data, compose) {
    const el = element.createElement;
    const { withSelect, withDispatch } = data;
    const { Button, ButtonGroup } = components;
    const { __ } = wp.i18n;

    /**
     * Update user meta data on selection
     */
    const dispatchMeta = function (dispatch, props) {
        return {
            setMetaValue: function (metaValue) {
                const userData = data.select('core').getCurrentUser();
                const user = data.select('core').getEntityRecord('root', 'user', userData.id);
                let visualeditorMeta = {};
                visualeditorMeta[props.metaKey] = metaValue;
                const completeDispatch = dispatch('core').saveUser({
                    id: user.id,
                    meta: { ...user.meta, ...visualeditorMeta },
                });

                completeDispatch.then(() => {
                    let root = document.documentElement;
                    root.style.setProperty('--toolbar-scale', metaValue);
                });
            },
        };
    };

    /**

   * Build and show style guidine to user
   * @param {object} props
   */

    const buildUI = function (props) {
        let currentValue = props.metaValue;
        if (currentValue == undefined) currentValue = 'hover';
        const editorWidthOptions = [
            { key: '0.7', name: __('0.7') },
            { key: '1', name: __('1') },
            { key: '1.5', name: __('1.5') },
			{ key: '2', name: __('2') },
        ];

        return el(
            ButtonGroup,
            null,
            editorWidthOptions.map(({ name, key }) =>
                el(
                    Button,
                    {
                        key: key,
                        isDefault: true,
                        isTertiary: currentValue !== key,
                        isPrimary: currentValue === key,
                        isPressed: currentValue === key,
                        onClick: () => {
                            props.setMetaValue(key);
                        },
                    },
                    name
                )
            )
        );
    };

    /**
     * Update user selection
     *
     * @param {object} select WP object
     * @param {object} props WP object
     */
    const updateSelect = function (select, props) {
        const userData = data.select('core').getCurrentUser();
        if (Object.keys(userData).length == 0) return {};
        const user = select('core').getEntityRecord('root', 'user', userData.id);
        return {
            metaValue: user == undefined ? 'hover' : user.meta[props.metaKey],
        };
    };

    return compose.compose(withDispatch(dispatchMeta), withSelect(updateSelect))(buildUI);
}
