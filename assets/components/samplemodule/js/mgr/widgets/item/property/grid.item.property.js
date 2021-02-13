'use strict';

sampleModule.grid.itemProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-itemproperty';
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
            xtype: 'samplemodule-window-itemproperty',
        },
    });
    sampleModule.grid.itemProperty.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.itemProperty, sampleModule.localGrid, {});
Ext.reg('samplemodule-grid-itemproperty', sampleModule.grid.itemProperty);
