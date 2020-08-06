'use strict';

SampleModule.grid.optionone = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-optionone';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
        baseParams: {
            action: 'mgr/optionone/getlist'
        },
        save_action: 'mgr/optionone/updatefromgrid',
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
                xtype: 'samplemodule-window-optionone',
                action: 'mgr/optionone/create',
            },
            update: {
                xtype: 'samplemodule-window-optionone',
                action: 'mgr/optionone/update',
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    SampleModule.grid.optionone.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.optionone, SampleModule.grid.abstract, {

});
Ext.reg('samplemodule-grid-optionone', SampleModule.grid.optionone);
