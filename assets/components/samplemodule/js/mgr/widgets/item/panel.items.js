'use strict';

var namespace = SampleModule.namespace;

SampleModule.panel.items = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = namespace + '-panel-items';
    }
    Ext.applyIf(config, {
        title: _(namespace + '_items')
    });
    SampleModule.panel.items.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.panel.items, SampleModule.panel.abstract, {
    getContent: function () {
        return [{
            items: [
                this.renderDescription(_(namespace + '_items_management')),
                this.renderContent([{xtype: namespace + '-grid-item'}])
            ]
        }];
    }
});
Ext.reg(namespace + '-panel-items', SampleModule.panel.items);
