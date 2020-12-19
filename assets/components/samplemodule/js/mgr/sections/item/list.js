'use strict';

Ext.namespace('sampleModule.page.item');

sampleModule.page.item.list = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-items'
        }]
    });
    sampleModule.page.item.list.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.item.list, sampleModule.page.abstract, {});
Ext.reg('samplemodule-page-item-list', sampleModule.page.item.list);
