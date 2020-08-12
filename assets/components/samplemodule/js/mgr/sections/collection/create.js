'use strict';

Ext.namespace('SampleModule.page.collection');

SampleModule.page.collection.create = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        formpanel: 'samplemodule-formpanel-collection',
        components: [{
            xtype: 'samplemodule-formpanel-collection',
            record: null,
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
    SampleModule.page.collection.create.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.page.collection.create, SampleModule.page.abstract, {
    getButtons: function (config) {
        return [
            this.getCreateButton(config),
            this.getCloseButton(config)
        ];
    }
});
Ext.reg('samplemodule-page-collection-create', SampleModule.page.collection.create);
