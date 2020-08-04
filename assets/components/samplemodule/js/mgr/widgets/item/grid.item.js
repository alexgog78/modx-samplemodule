'use strict';

SampleModule.grid.item = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-item';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/item/getlist'
        },
        save_action: 'mgr/item/updatefromgrid',
        fields: [
            'id',
            'collection_id',
            'name',
            'description',
            'richtext',
            'code',
            'type_id',
            'status_id',
            'template_id',
            'tags',
            'options',
            'menuindex',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
        ],
        columns: [

        ],
        recordActions: {
            create: {
                xtype: 'samplemodule-window-item',
                action: 'mgr/item/create',
            },
            update: {
                xtype: 'samplemodule-window-item',
                action: 'mgr/item/update',
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    SampleModule.grid.item.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.item, SampleModule.grid.abstract, {

});
Ext.reg('samplemodule-grid-item', SampleModule.grid.item);
