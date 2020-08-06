'use strict';

SampleModule.window.optionone = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
    });
    SampleModule.window.optionone.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.window.optionone, SampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getFields: function(config) {
        return [
            {xtype: 'hidden', name: 'id'},
            this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
            this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
        ];
    },
});
Ext.reg('samplemodule-window-optionone', SampleModule.window.optionone);
