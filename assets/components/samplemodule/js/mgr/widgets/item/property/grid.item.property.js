'use strict';

Ext.namespace('sampleModule.grid.item');

sampleModule.grid.item.property = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-item-property';
    }
    Ext.apply(config, {
        fields: [
            'key',
            'value'
        ],
        columns: [
            this.getGridColumn('key', {header: _('samplemodule_property_key')}),
            this.getGridColumn('value', {header: _('samplemodule_property_value')}),
        ],
        editWindow: {
            xtype: 'samplemodule-window-item-property',
        },
    });
    sampleModule.grid.item.property.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.item.property, sampleModule.localGrid, {});
Ext.reg('samplemodule-grid-item-property', sampleModule.grid.item.property);
