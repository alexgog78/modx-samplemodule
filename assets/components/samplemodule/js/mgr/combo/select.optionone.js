'use strict';

sampleModule.combo.selectRemote.optionone = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optionone/getlist',
            combo: true,
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    sampleModule.combo.selectRemote.optionone.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.selectRemote.optionone, sampleModule.combo.selectRemote);
Ext.reg('samplemodule-combo-select-optionone', sampleModule.combo.selectRemote.optionone);
