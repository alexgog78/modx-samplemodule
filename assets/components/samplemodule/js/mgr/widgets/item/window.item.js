'use strict';

sampleModule.window.item = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
    });
    sampleModule.window.item.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.window.item, sampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getFields: function(config) {
        return sampleModule.component.tabs([
            {
                title: _('samplemodule_item'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
                    this.getCollectionIdField(config),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_record_description')}),
                    this.getFormInput('image', {xtype: 'samplemodule-combo-browser-image', fieldLabel: _('samplemodule_record_image')}),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
                    sampleModule.component.logSection(this.record),
                ],
            }, {
                title: _('samplemodule_properties'),
            }
        ]);
    },

    getCollectionIdField: function (config) {
        if (config.collection_id) {
            return {xtype: 'hidden', name: 'collection_id', value: config.collection_id};
        }
        return this.getFormInput('collection_id', {xtype: 'ms2colors-combo-select-collection', fieldLabel: _('samplemodule_record_collection')});
    }
});
Ext.reg('samplemodule-window-item', sampleModule.window.item);
