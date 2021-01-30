'use strict';

sampleModule.combo.select.remote.category = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/category/getlist',
            combo: config.filter ? 0 : 1,
            filter: config.filter ?? 0,
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.select.remote.category.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.select.remote.category, sampleModule.combo.select.remote.abstract);
Ext.reg('samplemodule-combo-select-category', sampleModule.combo.select.remote.category);
