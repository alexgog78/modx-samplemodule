'use strict';

SampleModule.page.collections = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-collections'
        }]
    });
    SampleModule.page.collections.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collections, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-collections', SampleModule.page.collections);
