'use strict';

sampleModule.page.settings = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'samplemodule-panel-settings'
        }]
    });
    sampleModule.page.settings.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.settings, sampleModule.page.abstract, {});
Ext.reg('samplemodule-page-settings', sampleModule.page.settings);
