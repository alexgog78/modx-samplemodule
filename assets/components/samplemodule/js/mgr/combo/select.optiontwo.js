'use strict';

sampleModule.combo.select.remote.optiontwo = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optiontwo/getlist',
            combo: 1
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.select.remote.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.select.remote.optiontwo, sampleModule.combo.select.remote.abstract);
Ext.reg('samplemodule-combo-select-optiontwo', sampleModule.combo.select.remote.optiontwo);
