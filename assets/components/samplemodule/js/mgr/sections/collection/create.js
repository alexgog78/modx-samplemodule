'use strict';

Ext.namespace('sampleModule.page.collection');

sampleModule.page.collection.create = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        formpanel: 'samplemodule-formpanel-collection',
        components: [{
            xtype: 'samplemodule-formpanel-collection',
        }],
        recordActions: {
            create: {
                action: 'mgr/collection/create',
            },
            close: {
                loadPage: function () {
                    MODx.loadPage('mgr/collections', 'namespace=samplemodule')
                }
            }
        },
    });
    sampleModule.page.collection.create.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.collection.create, sampleModule.page.abstract, {
    getButtons: function (config) {
        return [
            this.getCreateButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('samplemodule-page-collection-create', sampleModule.page.collection.create);
