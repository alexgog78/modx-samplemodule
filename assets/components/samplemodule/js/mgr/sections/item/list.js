'use strict';

SampleModule.page.items = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-items'
        }]
    });
    SampleModule.page.items.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.items, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-items', SampleModule.page.items);
