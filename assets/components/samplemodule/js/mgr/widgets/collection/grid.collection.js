'use strict';

SampleModule.grid.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collection';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/collection/getlist'
        },
        save_action: 'mgr/collection/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'menuindex',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
        ],
        columns: [
            {dataIndex: 'id', header: _('id'), sortable: true, width: 0.05},
            {dataIndex: 'name', header: _('name'), sortable: true, width: 0.5, editor: {xtype: 'textfield'}},
            {dataIndex: 'is_active', header: _('samplemodule.field.active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: SampleModule.renderer.boolean},
            {dataIndex: 'created_on', header: _('samplemodule.field.created_on'), sortable: true, width: 0.2},
            {dataIndex: 'updated_on', header: _('samplemodule.field.updated_on'), sortable: true, width: 0.2},
        ],
        recordActions: {
            create: {
                xtype: 'samplemodule-window-collection',
                action: 'mgr/collection/create',
                loadPage: function () {
                    MODx.loadPage('mgr/collection/create', 'namespace=samplemodule');
                }
            },
            update: {
                xtype: 'samplemodule-window-collection',
                action: 'mgr/collection/update',
                loadPage: function () {
                    console.log(this);
                    MODx.loadPage('mgr/collection/update', 'namespace=samplemodule&id=' + this.menu.record.id);
                }
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    SampleModule.grid.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.collection, SampleModule.grid.abstract, {
    getMenu: function () {
        return [{
            text: _('view'),
            handler: this._quickUpdateRecord,
            scope: this
        }, {
            text: _('edit'),
            handler: this._updateRecord,
            scope: this
        }, '-', {
            text: _('delete'),
            handler: this._removeRecord,
            scope: this
        }];
    },

    getToolbar: function () {
        return [
            this.getQuickCreateButton(),
            this.getCreateButton(),
            '->',
            this.getSearchPanel()
        ];
    },
});
Ext.reg('samplemodule-grid-collection', SampleModule.grid.collection);
