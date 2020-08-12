'use strict';

SampleModule.panel.settings = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-settings';
    }
    Ext.applyIf(config, {
        title: _('samplemodule_settings')
    });
    SampleModule.panel.settings.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.settings, SampleModule.panel.abstract, {
    getComponents: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('samplemodule_settings_management')),
            SampleModule.component.verticalTabs([{
                title: _('samplemodule_categories'),
                items: [{xtype: 'samplemodule-grid-category'}]
            }, {
                title: _('samplemodule_optionsone'),
                items: [{xtype: 'samplemodule-grid-optionone'}]
            }, {
                title: _('samplemodule_optionstwo'),
                items: [{xtype: 'samplemodule-grid-optiontwo'}]
            }])
        ]);
    }
});
Ext.reg('samplemodule-panel-settings', SampleModule.panel.settings);
