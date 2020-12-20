'use strict';

Ext.namespace('sampleModule.page.collection');

sampleModule.page.collection.update = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        formpanel: 'samplemodule-formpanel-collection',
        components: [{
            xtype: 'samplemodule-formpanel-collection',
            record: config.record,
        }],
        recordActions: {
            update: {
                action: 'mgr/collection/update',
            },
            remove: {
                action: 'mgr/collection/remove'
            },
            close: {
                loadPage: function () {
                    MODx.loadPage('mgr/collection', 'namespace=samplemodule')
                }
            }
        },
    });
    sampleModule.page.collection.update.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.page.collection.update, sampleModule.page.abstract, {
    getButtons: function (config) {
        return [
            this.getUpdateButton(config),
            this.getDeleteButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('samplemodule-page-collection-update', sampleModule.page.collection.update);
