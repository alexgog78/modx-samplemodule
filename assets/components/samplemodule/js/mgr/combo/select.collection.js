'use strict';

sampleModule.combo.select.remote.collection = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/collection/getlist',
            combo: true
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.select.remote.collection.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.select.remote.collection, sampleModule.combo.select.remote.abstract);
Ext.reg('ms2colors-combo-select-collection', sampleModule.combo.select.remote.collection);
