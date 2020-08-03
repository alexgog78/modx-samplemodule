'use strict';

SampleModule.page.default = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-default'
        }]
    });
    SampleModule.page.default.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.default, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-default', SampleModule.page.default);
