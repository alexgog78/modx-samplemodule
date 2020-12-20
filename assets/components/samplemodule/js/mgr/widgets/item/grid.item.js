'use strict';

sampleModule.grid.item = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-item';
    }
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/item/getlist',
            collection_id: config.collection_id || 0,
        },
        save_action: 'mgr/item/updatefromgrid',
        fields: [
            'id',
            'collection_id',
            'collection_name',
            'collection_is_active',
            'name',
            'description',
            'image',
            'menuindex',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
            'properties',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_name'), width: 0.2, editor: {xtype: 'textfield'}}),
            this.getGridColumn('image', {header: _('samplemodule_item_image'), width: 0.2, renderer: sampleModule.renderer.image}),
            this.getGridColumn('collection_name', {header: _('samplemodule_item_collection'), width: 0.2, renderer: this._inactiveCategory}),
            this.getGridColumn('is_active', {header: _('samplemodule_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: sampleModule.renderer.boolean}),
            this.getGridColumn('created_on', {header: _('samplemodule_createdon'), width: 0.1}),
            this.getGridColumn('updated_on', {header: _('samplemodule_updatedon'), width: 0.1}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'samplemodule-window-item',
                action: 'mgr/item/create',
                collection_id: config.collection_id || 0,
            },
            quickUpdate: {
                xtype: 'samplemodule-window-item',
                action: 'mgr/item/update',
                collection_id: config.collection_id || 0,
            },
            remove: {
                action: 'mgr/item/remove'
            }
        },
    });
    sampleModule.grid.item.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.item, sampleModule.grid.abstract, {
    getRowClass: function (record) {
        return record.data.is_active && record.data.collection_is_active === '1'
            ? 'grid-row-active'
            : 'grid-row-inactive';
    },

    _inactiveCategory: function (value, cell, row) {
        let is_active = row.get('collection_is_active');
        if (is_active !== '1') {
            cell.css = 'red';
        }
        return value;
    },
});
Ext.reg('samplemodule-grid-item', sampleModule.grid.item);
