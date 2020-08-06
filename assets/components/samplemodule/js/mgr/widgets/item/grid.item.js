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
            'collection_name',
            'name',
            'description',
            'image',
            'menuindex',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
            'options',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_record_name'), width: 0.4, editor: {xtype: 'textfield'}}),
            this.getGridColumn('collection_name', {header: _('samplemodule_record_collection'), width: 0.2}),
            this.getGridColumn('is_active', {header: _('samplemodule_record_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: SampleModule.renderer.boolean}),
            this.getGridColumn('created_on', {header: _('samplemodule_record_createdon'), width: 0.1}),
            this.getGridColumn('updated_on', {header: _('samplemodule_record_updatedon'), width: 0.1}),
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
