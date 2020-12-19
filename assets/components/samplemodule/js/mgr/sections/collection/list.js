'use strict';

Ext.namespace('sampleModule.page.collection');

sampleModule.page.collection.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-collections'
        }]
    });
    sampleModule.page.collection.list.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.collection.list, sampleModule.page.abstract, {});
Ext.reg('samplemodule-page-collection-list', sampleModule.page.collection.list);
