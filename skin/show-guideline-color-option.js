function visualeditorColorOption(element, components, data, compose) {
    const el = element.createElement;
    const { withSelect, withDispatch } = data;
    const { ColorPalette } = components;
    const { __ } = wp.i18n;

    /**
     * Update user meta data on selection
     */
    const dispatchMeta = function (dispatch, props) {
        return {
            setMetaValue: function (metaValue) {
                const userData = data.select('core').getCurrentUser();
                const user = data.select('core').getEntityRecord('root', 'user', userData.id);
                let visualeditorColorsMeta = {};
                visualeditorColorsMeta[props.metaKey] = metaValue;
                const completeDispatch = dispatch('core').saveUser({
                    id: user.id,
                    meta: { ...user.meta, ...visualeditorColorsMeta },
                });

                completeDispatch.then(() => {
                    let root = document.documentElement;
                    root.style.setProperty('--guideline-color', metaValue);

                });
            },
        };
    };

    /**
     * Build and show color button to user
     * @param {object} props
     */
    const buildColorPicker = function (props) {
        let currentValue = props.metaValue;

        if (currentValue == undefined) currentValue = '#bdc3c7';

        const colors = [
            { name: 'Green', color: '#16a085' },
            { name: 'Violet', color: '#991199' },
            { name: 'Orange', color: '#d0611c' },
            { name: 'Yellow', color: '#f1c40f' },
            { name: 'Red', color: '#e74c3c' },
            { name: 'Silver', color: '#bdc3c7' },
        ];

        return el(ColorPalette, {
            label: 'Select guide line color',
            colors: colors,
            value: currentValue,
            disableCustomColors: true,
            clearable: false,
            onChange: (value) => {
                props.setMetaValue(value);
            },
        });
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
            metaValue: user == undefined ? true : user.meta[props.metaKey],
        };
    };

    //   const dispatchMeta = function (dispatch, props) {};
    // const updateSelect = function (select, props) {};
    // const buildUI = function (props) {};

    return compose.compose(withDispatch(dispatchMeta), withSelect(updateSelect))(buildColorPicker);
}
