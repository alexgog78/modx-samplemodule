'use strict';

sampleModule.grid.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collection';
    }
    this.sm = new Ext.grid.CheckboxSelectionModel();
    Ext.applyIf(config, {
        sm: this.sm,
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
            'tags_combo',
            'sort_order',
            'is_active',
            'created_on',
            'created_by',
            'updated_on',
            'updated_by',
            'properties',
            'categories',
            'items_count',
        ],
        columns: [
            this.sm,
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_name'), width: 0.5, editor: {xtype: 'textfield'}}),
            this.getGridColumn('items_count', {header: _('samplemodule_collection_items'), width: 0.1}),
            this.getGridColumn('is_active', {header: _('samplemodule_active'), width: 0.1, editor: {xtype: 'combo-boolean'}, renderer: sampleModule.renderer.boolean}),
            this.getGridColumn('created_on', {header: _('samplemodule_createdon'), width: 0.1}),
            this.getGridColumn('updated_on', {header: _('samplemodule_updatedon'), width: 0.1}),
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
        },
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
            this.getBulkActions(),
            '->',
            this.getSearchPanel()
        ];
    },

    getBulkActions: function () {
        return {
            text: _('bulk_actions'),
            menu: [{
                text: _('selected_activate'),
                handler: this._activateSelected,
                scope: this,
            }, {
                text: _('selected_deactivate'),
                handler: this._deactivateSelected,
                scope: this,
            }, {
                text: _('selected_remove'),
                handler: this._removeSelected,
                scope: this,
            }]
        };
    },

    getSearchPanel: function () {
        return [
            this._getSearchByCategoryField(),
            this._getSearchField(),
            this._getClearSearchButton(),
        ];
    },

    _activateSelected: function () {
        var selected = this.getSelectedAsList();
        if (selected === false) {
            return false;
        }
        this._updateSelected(selected, {is_active: 1})
        return true;
    },

    _deactivateSelected: function () {
        var selected = this.getSelectedAsList();
        if (selected === false) {
            return false;
        }
        this._updateSelected(selected, {is_active: 0})
        return true;
    },

    _updateSelected(records, fields) {
        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'mgr/collection/updatemultiple',
                records: records,
                fields: Ext.encode(fields),
            },
            listeners: {
                'success': {
                    fn: function (r) {
                        this.getSelectionModel().clearSelections(true);
                        this.refresh();
                    }, scope: this
                },
                'failure': {
                    fn: function (r) {
                    }, scope: this
                },
            }
        });
    },

    _removeSelected: function () {
        var selected = this.getSelectedAsList();
        if (selected === false) {
            return false;
        }
        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'mgr/collection/removemultiple',
                records: selected,
            },
            listeners: {
                'success': {
                    fn: function (r) {
                        this.getSelectionModel().clearSelections(true);
                        this.refresh();
                    }, scope: this
                },
                'failure': {
                    fn: function (r) {
                    }, scope: this
                },
            }
        });
        return true;
    },

    _getSearchByCategoryField: function () {
        return {
            xtype: 'samplemodule-combo-select-category',
            emptyText: _('samplemodule_category'),
            filter: 1,
            id: this.config.id + '-filter-category',
            width: 200,
            listeners: {
                'select': {fn: this._filterByCategory, scope: this},
            }
        };
    },

    _filterByCategory: function (cb, nv, ov) {
        this.getStore().baseParams.category_id = Ext.isEmpty(nv) || Ext.isObject(nv) ? cb.getValue() : nv;
        this.getBottomToolbar().changePage(1);
        return true;
    },

    _filterClear: function () {
        this.getStore().baseParams.category_id = 0;
        Ext.getCmp(this.config.id + '-filter-category').reset();
        sampleModule.grid.collection.superclass._filterClear.call(this);
    },
});
Ext.reg('samplemodule-grid-collection', sampleModule.grid.collection);
