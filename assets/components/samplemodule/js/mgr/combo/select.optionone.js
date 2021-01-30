'use strict';

sampleModule.combo.select.remote.optionone = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optionone/getlist',
            combo: 1,
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.select.remote.optionone.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.select.remote.optionone, sampleModule.combo.select.remote.abstract);
Ext.reg('samplemodule-combo-select-optionone', sampleModule.combo.select.remote.optionone);
