'use strict';

sampleModule.grid.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collection';
    }
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/collection/getlist'
        },
        save_action: 'mgr/collection/updatefromgrid',
        fields: [
            'id',
            'name',
            'description',
            'richtext',
            'code',
            'option_one_id',
            'option_two_id',
            'tags',
            'menuindex',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
            'options',
            'categoryids',

            'items_count',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_record_name'), width: 0.6, editor: {xtype: 'textfield'}}),
            this.getGridColumn('items_count', {header: _('samplemodule_collection_items'), width: 0.1}),
            this.getGridColumn('is_active', {header: _('samplemodule_record_active'), width: 0.1, editor: {xtype: 'combo-boolean'}, renderer: sampleModule.renderer.boolean}),
            this.getGridColumn('created_on', {header: _('samplemodule_record_createdon'), width: 0.1}),
            this.getGridColumn('updated_on', {header: _('samplemodule_record_updatedon'), width: 0.1}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'samplemodule-window-collection',
                action: 'mgr/collection/create',
            },
            quickUpdate: {
                xtype: 'samplemodule-window-collection',
                action: 'mgr/collection/update',
            },
            create: function () {
                MODx.loadPage('mgr/collection/create', 'namespace=samplemodule');
            },
            update: function () {
                MODx.loadPage('mgr/collection/update', 'namespace=samplemodule&id=' + this.menu.record.id);
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    sampleModule.grid.collection.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.collection, sampleModule.grid.abstract, {
    getMenu: function () {
        return [{
            text: _('edit'),
            handler: this._updateRecord,
            scope: this
        }, {
            text: _('quick_update'),
            handler: this._quickUpdateRecord,
            scope: this
        }, '-', {
            text: _('delete'),
            handler: this._removeRecord,
            scope: this
        }];
    },

    getToolbar: function () {
        return [
            this.getCreateButton(),
            this.getQuickCreateButton({text: _('quick_create'), cls: ''}),
            '->',
            this.getSearchPanel()
        ];
    },
});
Ext.reg('samplemodule-grid-collection', sampleModule.grid.collection);
