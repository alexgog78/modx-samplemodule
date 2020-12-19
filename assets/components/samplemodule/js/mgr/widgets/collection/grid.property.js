'use strict';

Ext.namespace('SampleModule.localGrid.collection');

SampleModule.localGrid.collection.property = function (config) {
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
    SampleModule.localGrid.collection.property.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.localGrid.collection.property, SampleModule.localGrid.abstract, {

});
Ext.reg('samplemodule-localgrid-collection-property', SampleModule.localGrid.collection.property);
