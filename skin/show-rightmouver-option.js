function visualeditorRightMouverOption(element, components, data, compose) {
    const el = element.createElement;
    const { withSelect, withDispatch } = data;
    const { ToggleControl } = components;
    const { __ } = wp.i18n;

    /**
     * Update user meta data when selection
     */

    const dispatchMeta = function (dispatch, props) {
        return {
            setMetaValue: function (metaValue) {
                const userData = data.select('core').getCurrentUser();
                const user = data.select('core').getEntityRecord('root', 'user', userData.id);
                let visualeditorRightMouverMeta = {};

                visualeditorRightMouverMeta[props.metaKey] = metaValue;
                const completeDispatch = dispatch('core').saveUser({
                    id: user.id,

                    meta: { ...user.meta, ...visualeditorRightMouverMeta },
                });
                completeDispatch.then(() => {
                    document.body.setAttribute('show-rightmouver-block', metaValue);
                });
            },
        };
    };

    /**
     * Build and show Toggle Button
     * @param {object} props
     */

    const buildUI = function (props) {
        let currentValue = props.metaValue;

        if (currentValue == undefined) currentValue = true;

        return el(ToggleControl, {
            label: 'Mouver to right?',
            checked: currentValue,
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

    return compose.compose(withDispatch(dispatchMeta), withSelect(updateSelect))(buildUI);
}