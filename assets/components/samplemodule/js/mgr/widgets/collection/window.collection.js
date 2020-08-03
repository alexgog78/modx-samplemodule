'use strict';

SampleModule.window.collection = function (config) {
    config = config || {};
    /*if (!config.id) {
        config.id = 'samplemodule-window-collection';
    }*/
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl
    });
    SampleModule.window.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.window.collection, SampleModule.window.abstract, {
    formInputs: {
        'id': {},
        'name': {},
        'description': {},
        'menuindex': {},
        'is_active': {},
        'created_on': {},
        'created_by': {},
        'updated_on': {},
        'updated_by': {},
    },

    defaultValues: {
        is_active: 1
    },
});
Ext.reg('samplemodule-window-collection', SampleModule.window.collection);
