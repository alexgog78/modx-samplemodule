'use strict';

sampleModule.panel.default = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-default';
    }
    Ext.applyIf(config, {
        title: _('samplemodule'),
    });
    sampleModule.panel.default.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.panel.default, sampleModule.panel.abstract, {
    getComponents: function (config) {
        return this.renderTabsPanel([{
            title: _('samplemodule_collections'),
            items: [
                this.getDescription(_('samplemodule_collection_list_management')),
                this.getContent([{xtype: 'samplemodule-grid-collection'}])
            ]
        }, {
            title: _('samplemodule_items'),
            items: [
                this.getDescription(_('samplemodule_item_list_management')),
                this.getContent([{xtype: 'samplemodule-grid-item'}])
            ]
        }]);
    }
});
Ext.reg('samplemodule-panel-default', sampleModule.panel.default);
