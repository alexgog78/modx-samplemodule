'use strict';

SampleModule.combo.multiSelectRemote.category = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: new Ext.data.JsonStore({
            id: (config.id || 'samplemodule-combo-multiselect-category') + '-store',
            url: SampleModule.config.connectorUrl,
            baseParams: {
                action: 'mgr/category/getlist',
                combo: true,
            },
            fields: ['id', 'name'],
            root: 'results',
            totalProperty: 'total',
            autoLoad: false,
            autoSave: false,
        }),
        displayField: 'name',
        valueField: 'id',
    });
    SampleModule.combo.multiSelectRemote.category.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.multiSelectRemote.category, SampleModule.combo.multiSelectRemote);
Ext.reg('samplemodule-combo-multiselect-category', SampleModule.combo.multiSelectRemote.category);
