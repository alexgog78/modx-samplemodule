'use strict';

Ext.namespace('SampleModule.page.collection');

SampleModule.page.collection.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-collections'
        }]
    });
    SampleModule.page.collection.list.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collection.list, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-collection-list', SampleModule.page.collection.list);
