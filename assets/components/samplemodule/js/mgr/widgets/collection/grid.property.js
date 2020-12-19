'use strict';

Ext.namespace('sampleModule.localGrid.collection');

sampleModule.localGrid.collection.property = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        id: 'samplemodule-localgrid-collection-property',
        fields: [
            'key',
            'value'
        ],
        _columns: [
            this.getGridColumn('key'),
            this.getGridColumn('value'),
            //{header: _('samplemodule_record_property_key'), dataIndex: 'key', sortable: false, width: 0.3},
            //{header: _('samplemodule_record_property_value'), dataIndex: 'value', sortable: false, width: 0.7},
        ]
    });
    sampleModule.localGrid.collection.property.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.localGrid.collection.property, sampleModule.localGrid.abstract, {

});
Ext.reg('samplemodule-localgrid-collection-property', sampleModule.localGrid.collection.property);
