'use strict';

SampleModule.panel.collections = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-panel-collections';
    }
    Ext.applyIf(config, {
        title: _('samplemodule_collections')
    });
    SampleModule.panel.collections.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.collections, SampleModule.panel.abstract, {
    getComponents: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('samplemodule_collections_management')),
            this.getContent([{xtype: 'samplemodule-grid-collection'}]),
        ]);
    }
});
Ext.reg('samplemodule-panel-collections', SampleModule.panel.collections);
