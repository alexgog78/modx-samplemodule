'use strict';

Ext.namespace('SampleModule.page.collection');

SampleModule.page.collection.create = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        formpanel: 'samplemodule-formpanel-collection',
        components: [{
            xtype: 'samplemodule-formpanel-collection',
            record: null,
        }]
    });
    SampleModule.page.collection.create.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collection.create, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-collection-create', SampleModule.page.collection.create);
