'use strict';

Ext.namespace('SampleModule.page.collection');

SampleModule.page.collection.update = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
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
                    MODx.loadPage('mgr/collections', 'namespace=samplemodule')
                }
            }
        },
    });
    SampleModule.page.collection.update.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collection.update, SampleModule.page.abstract, {
    getButtons: function (config) {
        return [
            this.getUpdateButton(config),
            this.getDeleteButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('samplemodule-page-collection-update', SampleModule.page.collection.update);
