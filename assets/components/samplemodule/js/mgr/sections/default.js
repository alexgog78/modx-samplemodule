'use strict';

sampleModule.page.default = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-default'
        }]
    });
    sampleModule.page.default.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.default, sampleModule.page.abstract, {});
Ext.reg('samplemodule-page-default', sampleModule.page.default);
