'use strict';

sampleModule.window.category = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
    });
    sampleModule.window.category.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.window.category, sampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id'},
            this.getFormInput('name', {fieldLabel: _('samplemodule_name')}),
            this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_active')}),
        ];
    },
});
Ext.reg('samplemodule-window-category', sampleModule.window.category);
