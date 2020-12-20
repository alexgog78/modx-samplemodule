'use strict';

sampleModule.combo.multiSelectRemote.category = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        store: new Ext.data.JsonStore({
            id: (config.id || 'samplemodule-combo-multiselect-category') + '-store',
            url: sampleModule.config.connectorUrl,
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
        dataIndex: 'categories',
    });
    sampleModule.combo.multiSelectRemote.category.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.multiSelectRemote.category, sampleModule.combo.multiSelectRemote);
Ext.reg('samplemodule-combo-multiselect-category', sampleModule.combo.multiSelectRemote.category);
