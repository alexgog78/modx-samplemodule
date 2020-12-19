'use strict';

sampleModule.combo.selectRemote.collection = function (config) {
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
    sampleModule.combo.selectRemote.collection.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.selectRemote.collection, sampleModule.combo.selectRemote);
Ext.reg('ms2colors-combo-select-collection', sampleModule.combo.selectRemote.collection);
