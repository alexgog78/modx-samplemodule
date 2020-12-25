'use strict';

Ext.namespace('sampleModule.combo.selectRemote');

sampleModule.combo.selectRemote.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        url: null,
        baseParams: {
            action: null,
            combo: true
        },
        fields: [],
        displayField: null,
        valueField: null,

        //Core settings
        name: config.name || 'select-remote',
        typeAhead: true,
        editable: true,
        allowBlank: true,
        emptyText: _('no'),
        pageSize: 20,
        //TODO check hideMode: 'offsets',
    });
    if (!config.hiddenName) {
        config.hiddenName = config.name;
    }
    sampleModule.combo.selectRemote.abstract.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.selectRemote.abstract, MODx.combo.ComboBox);
