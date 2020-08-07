'use strict';

SampleModule.combo.selectRemote.optiontwo = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optiontwo/getlist',
            combo: true
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    SampleModule.combo.selectRemote.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.selectRemote.optiontwo, SampleModule.combo.selectRemote);
Ext.reg('samplemodule-combo-select-optiontwo', SampleModule.combo.selectRemote.optiontwo);
