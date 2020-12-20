'use strict';

sampleModule.grid.category = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-category';
    }
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/category/getlist'
        },
        save_action: 'mgr/category/updatefromgrid',
        fields: [
            'id',
            'name',
            'menuindex',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_name'), width: 0.9, editor: {xtype: 'textfield'}}),
            this.getGridColumn('is_active', {header: _('samplemodule_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: sampleModule.renderer.boolean}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'samplemodule-window-category',
                action: 'mgr/category/create',
            },
            quickUpdate: {
                xtype: 'samplemodule-window-category',
                action: 'mgr/category/update',
            },
            remove: {
                action: 'mgr/category/remove'
            }
        }
    });
    sampleModule.grid.category.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.category, sampleModule.grid.abstract, {});
Ext.reg('samplemodule-grid-category', sampleModule.grid.category);
