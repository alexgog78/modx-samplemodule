'use strict';

sampleModule.combo.selectRemote.optiontwo = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optiontwo/getlist',
            combo: true
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.selectRemote.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.selectRemote.optiontwo, sampleModule.combo.selectRemote.abstract);
Ext.reg('samplemodule-combo-select-optiontwo', sampleModule.combo.selectRemote.optiontwo);
