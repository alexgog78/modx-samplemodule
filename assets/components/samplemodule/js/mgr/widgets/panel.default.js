'use strict';

SampleModule.panel.default = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-default';
    }
    Ext.applyIf(config, {
        title: _('samplemodule'),
    });
    SampleModule.panel.default.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.default, SampleModule.panel.abstract, {
    getComponents: function () {
        return [{
            title: _('samplemodule_collections'),
            items: [
                this.getDescription(_('samplemodule_collections_management')),
                this.getContent([{xtype: 'samplemodule-grid-collection'}])
            ]
        }, {
            title: _('samplemodule_items'),
            items: [
                this.getDescription(_('samplemodule_items_management')),
                this.getContent([{xtype: 'samplemodule-grid-item'}])
            ]
        }];
    }
});
Ext.reg('samplemodule-panel-default', SampleModule.panel.default);
