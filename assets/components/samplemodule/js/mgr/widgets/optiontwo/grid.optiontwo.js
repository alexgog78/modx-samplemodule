'use strict';

SampleModule.grid.optiontwo = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-optiontwo';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
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
            this.getGridColumn('name', {header: _('samplemodule_record_name'), width: 0.9, editor: {xtype: 'textfield'}}),
            this.getGridColumn('is_active', {header: _('samplemodule_record_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: SampleModule.renderer.boolean}),
        ],
        recordActions: {
            create: {
                xtype: 'samplemodule-window-optiontwo',
                action: 'mgr/optiontwo/create',
            },
            update: {
                xtype: 'samplemodule-window-optiontwo',
                action: 'mgr/optiontwo/update',
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    SampleModule.grid.optiontwo.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.optiontwo, SampleModule.grid.abstract, {

});
Ext.reg('samplemodule-grid-optiontwo', SampleModule.grid.optiontwo);
