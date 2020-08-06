'use strict';

SampleModule.window.item = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
    });
    SampleModule.window.item.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.window.item, SampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    /*
    'id',
    'collection_id',
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
    */

    getFields: function(config) {
        return SampleModule.component.tabs([
            {
                title: _('samplemodule_record_general'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
                    this.getFormInput('collection_id'),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_record_description')}),
                    this.getFormInput('image'),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
                    {
                        //xtype: 'fieldset',
                        layout: 'column',
                        defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                        items: [{
                            columnWidth: .5,
                            layout: 'form',
                            defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                            items: [
                                this.getFormInput('created_on', {fieldLabel: _('samplemodule_record_createdon'), readOnly: true}),
                                this.getFormInput('created_by', {fieldLabel: _('samplemodule_record_createdby'), readOnly: true}),
                            ]
                        }, {
                            columnWidth: .5,
                            layout: 'form',
                            defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                            items: [
                                this.getFormInput('updated_on', {fieldLabel: _('samplemodule_record_updatedon'), readOnly: true}),
                                this.getFormInput('updated_by', {fieldLabel: _('samplemodule_record_updatedby'), readOnly: true}),
                            ]
                        }]
                    }
                ],
            }, {
                title: _('samplemodule_record_options'),
            }
        ]);
    },
});
Ext.reg('samplemodule-window-item', SampleModule.window.item);
