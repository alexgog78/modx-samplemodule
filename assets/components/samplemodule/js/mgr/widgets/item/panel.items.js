'use strict';

SampleModule.panel.items = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-items';
    }
    Ext.applyIf(config, {
        title: _('samplemodule_items')
    });
    SampleModule.panel.items.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.items, SampleModule.panel.abstract, {
    getComponents: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('samplemodule_items_management')),
            this.getContent([{xtype: 'samplemodule-grid-item'}]),
        ]);
    }
});
Ext.reg('samplemodule-panel-items', SampleModule.panel.items);
