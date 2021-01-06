'use strict';

sampleModule.combo.multiSelect.remote.category = function (config) {
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
    sampleModule.combo.multiSelect.remote.category.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.multiSelect.remote.category, sampleModule.combo.multiSelect.remote.abstract);
Ext.reg('samplemodule-combo-multiselect-category', sampleModule.combo.multiSelect.remote.category);
