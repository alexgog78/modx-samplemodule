'use strict';

SampleModule.window.collection = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
    });
    SampleModule.window.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.window.collection, SampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getFields: function(config) {
        return [
            {xtype: 'hidden', name: 'id'},
            this.getFormInput('name'),
            this.getFormInput('description'),
            this.getFormInput('is_active'),
            this.getFormInput('created_on'),
            this.getFormInput('created_by'),
            this.getFormInput('updated_on'),
            this.getFormInput('updated_by'),
        ];
    },
});
Ext.reg('samplemodule-window-collection', SampleModule.window.collection);
