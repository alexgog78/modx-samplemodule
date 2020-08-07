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

    getFields: function(config) {
        return SampleModule.component.tabs([
            {
                title: _('samplemodule_tab_general'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
                    this.getCollectionIdField(config),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_record_description')}),
                    this.getFormInput('image', {xtype: 'samplemodule-combo-browser-image', fieldLabel: _('samplemodule_record_image')}),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
                    {
                        html: '<hr />',
                    }, {
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
                title: _('samplemodule_tab_options'),
            }
        ]);
    },

    getCollectionIdField: function (config) {
        return this.getFormInput('collection_id', {xtype: 'ms2colors-combo-select-collection', fieldLabel: _('samplemodule_record_collection')});
    }
});
Ext.reg('samplemodule-window-item', SampleModule.window.item);
