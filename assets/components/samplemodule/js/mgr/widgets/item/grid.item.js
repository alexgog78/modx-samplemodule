'use strict';

SampleModule.grid.item = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-item';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
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
            'options',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_record_name'), width: 0.4, editor: {xtype: 'textfield'}}),
            this.getGridColumn('collection_name', {header: _('samplemodule_record_collection'), width: 0.2, renderer: this._inactiveCategory}),
            this.getGridColumn('is_active', {header: _('samplemodule_record_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: SampleModule.renderer.boolean}),
            this.getGridColumn('created_on', {header: _('samplemodule_record_createdon'), width: 0.1}),
            this.getGridColumn('updated_on', {header: _('samplemodule_record_updatedon'), width: 0.1}),
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
        }
    });
    SampleModule.grid.item.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.item, SampleModule.grid.abstract, {
    getRowClass: function (record) {
        return record.data.is_active && record.data.collection_is_active == '1' ? 'grid-row-active' : 'grid-row-inactive';
    },

    _inactiveCategory: function (value, cell, row) {
        let is_active = row.get('collection_is_active');
        if (is_active !== '1') {
            cell.css = 'red';
        }
        return value;
    }
});
Ext.reg('samplemodule-grid-item', SampleModule.grid.item);
