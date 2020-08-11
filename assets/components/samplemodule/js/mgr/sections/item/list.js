'use strict';

Ext.namespace('SampleModule.page.item');

SampleModule.page.item.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-items'
        }]
    });
    SampleModule.page.item.list.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.item.list, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-item-list', SampleModule.page.item.list);
