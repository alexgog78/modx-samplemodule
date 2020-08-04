'use strict';

SampleModule.panel.settings = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-settings';
    }
    Ext.applyIf(config, {
        title:  _('samplemodule_settings')
    });
    SampleModule.panel.settings.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.settings, SampleModule.panel.abstract, {
    getContent: function () {
        return [{
            items: [
                this.renderDescription(_('samplemodule_items_management')),
                //this.renderContent([{xtype: 'samplemodule-grid-item'}])
            ]
        }];
    }
});
Ext.reg('samplemodule-panel-settings', SampleModule.panel.settings);

