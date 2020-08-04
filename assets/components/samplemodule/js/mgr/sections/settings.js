'use strict';

SampleModule.page.settings = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-settings'
        }]
    });
    SampleModule.page.settings.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.settings, SampleModule.page.abstract, {});
Ext.reg('samplemodule-page-settings', SampleModule.page.settings);
