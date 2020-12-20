'use strict';

sampleModule.grid.optiontwo = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-optiontwo';
    }
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optiontwo/getlist'
        },
        save_action: 'mgr/optiontwo/updatefromgrid',
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
                xtype: 'samplemodule-window-optiontwo',
                action: 'mgr/optiontwo/create',
            },
            quickUpdate: {
                xtype: 'samplemodule-window-optiontwo',
                action: 'mgr/optiontwo/update',
            },
            remove: {
                action: 'mgr/optiontwo/remove'
            }
        }
    });
    sampleModule.grid.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.optiontwo, sampleModule.grid.abstract, {});
Ext.reg('samplemodule-grid-optiontwo', sampleModule.grid.optiontwo);
