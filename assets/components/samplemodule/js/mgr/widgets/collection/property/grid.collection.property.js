'use strict';

Ext.namespace('sampleModule.grid.collection');

sampleModule.grid.collection.property = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collection-property';
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
            xtype: 'samplemodule-window-collection-property',
        },
    });
    sampleModule.grid.collection.property.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.collection.property, sampleModule.localGrid, {});
Ext.reg('samplemodule-grid-collection-property', sampleModule.grid.collection.property);
