'use strict';

SampleModule.grid.category = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-category';
    }
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
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
            this.getGridColumn('name', {header: _('samplemodule_record_name'), width: 0.9, editor: {xtype: 'textfield'}}),
            this.getGridColumn('is_active', {header: _('samplemodule_record_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: SampleModule.renderer.boolean}),
        ],
        recordActions: {
            create: {
                xtype: 'samplemodule-window-category',
                action: 'mgr/category/create',
            },
            update: {
                xtype: 'samplemodule-window-category',
                action: 'mgr/category/update',
            },
            remove: {
                action: 'mgr/collection/remove'
            }
        }
    });
    SampleModule.grid.category.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.grid.category, SampleModule.grid.abstract, {

});
Ext.reg('samplemodule-grid-category', SampleModule.grid.category);
