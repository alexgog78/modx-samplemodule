'use strict';

SampleModule.combo.selectRemote.optionone = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optionone/getlist',
            combo: true,
        },
        fields: ['id', 'name'],
        displayField: 'name',
        valueField: 'id',
    });
    SampleModule.combo.selectRemote.optionone.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.selectRemote.optionone, SampleModule.combo.selectRemote);
Ext.reg('samplemodule-combo-select-optionone', SampleModule.combo.selectRemote.optionone);
