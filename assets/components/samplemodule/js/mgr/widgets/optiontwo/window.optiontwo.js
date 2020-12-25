'use strict';

sampleModule.window.optiontwo = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
    });
    sampleModule.window.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.window.optiontwo, sampleModule.window.abstract, {
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
Ext.reg('samplemodule-window-optiontwo', sampleModule.window.optiontwo);
