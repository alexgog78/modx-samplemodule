'use strict';

Ext.namespace('SampleModule.page.collection');

SampleModule.page.collection.update = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        formpanel: 'samplemodule-formpanel-collection',
        components: [{
            xtype: 'samplemodule-formpanel-collection',
            record: config.record,
        }]
    });
    SampleModule.page.collection.update.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collection.update, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-collection-update', SampleModule.page.collection.update);
