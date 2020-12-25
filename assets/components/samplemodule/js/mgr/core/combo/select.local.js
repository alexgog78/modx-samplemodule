'use strict';

Ext.namespace('sampleModule.combo.selectLocal');

sampleModule.combo.selectLocal.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        store: [],
        fields: [],
        displayField: null,
        valueField: null,

        //Core settings
        queryMode: 'local',
        name: config.name || 'select-local',
        typeAhead: true,
        editable: true,
        allowBlank: true,
        emptyText: _('no'),
    });
    if (!config.hiddenName) {
        config.hiddenName = config.name;
    }
    sampleModule.combo.selectLocal.abstract.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.selectLocal.abstract, MODx.combo.ComboBox);
