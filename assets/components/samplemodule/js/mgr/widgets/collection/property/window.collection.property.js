'use strict';

sampleModule.window.collectionProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-window-collectionproperty';
    }
    Ext.apply(config, {});
    sampleModule.window.collectionProperty.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.window.collectionProperty, sampleModule.window.abstract, {
    getFields: function (config) {
        return [
            this.getFormInput('key', {fieldLabel: _('samplemodule_property_key'), allowBlank: false}),
            this.getFormInput('value', {xtype: 'textarea', fieldLabel: _('samplemodule_property_value'), allowBlank: false}),
        ];
    },

    beforeSubmit: function (record) {
        return this.fp.getForm().isValid();
    },

    submit: function (close) {
        let values = this.fp.getForm().getValues();
        let store = this.grid.getStore();
        if (!this.fireEvent('beforeSubmit', values)) {
            return false;
        }
        if (this.config.record && this.config.record.key) {
            let idx = store.find('key', this.config.record.key);
            store.removeAt(idx);
            store.add(new Ext.data.Record(values));
        } else {
            store.add(new Ext.data.Record(values));
        }
        this.close();
    }
});
Ext.reg('samplemodule-window-collectionproperty', sampleModule.window.collectionProperty);
