'use strict';

sampleModule.grid.collectionProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collectionproperty';
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
            xtype: 'samplemodule-window-collectionproperty',
        },
    });
    sampleModule.grid.collectionProperty.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.collectionProperty, sampleModule.localGrid, {});
Ext.reg('samplemodule-grid-collectionproperty', sampleModule.grid.collectionProperty);
