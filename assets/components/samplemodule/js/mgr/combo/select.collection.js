'use strict';

SampleModule.combo.selectRemote.collection = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/collection/getlist',
            combo: true
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    SampleModule.combo.selectRemote.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.selectRemote.collection, SampleModule.combo.selectRemote);
Ext.reg('ms2colors-combo-select-collection', SampleModule.combo.selectRemote.collection);
