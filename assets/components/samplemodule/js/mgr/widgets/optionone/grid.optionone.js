'use strict';

sampleModule.grid.optionone = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-optionone';
    }
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optionone/getlist'
        },
        save_action: 'mgr/optionone/updatefromgrid',
        fields: [
            'id',
            'name',
            'sort_order',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('samplemodule_name'), width: 0.9, editor: {xtype: 'textfield'}}),
            this.getGridColumn('is_active', {header: _('samplemodule_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: sampleModule.renderer.boolean}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'samplemodule-window-optionone',
                action: 'mgr/optionone/create',
            },
            quickUpdate: {
                xtype: 'samplemodule-window-optionone',
                action: 'mgr/optionone/update',
            },
            remove: {
                action: 'mgr/optionone/remove'
            }
        }
    });
    sampleModule.grid.optionone.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.optionone, sampleModule.grid.abstract, {});
Ext.reg('samplemodule-grid-optionone', sampleModule.grid.optionone);
