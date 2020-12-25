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

    renderForm: function () {
        sampleModule.window.item.superclass.renderForm.call(this);

        let imagePreviewField = Ext.getCmp('image-item-preview');
        let src = sampleModule.config.cssUrl + 'mgr/core/no-photo.png';
        if (this.record.image) {
            src = this.record.image;
        }
        imagePreviewField.setValue('<img src="' + MODx.config.connectors_url + 'system/phpthumb.php?&src=' + src + '&h=100&aoe=0&far=0" alt="">');
    },

    setRecord: function () {
        let grid = Ext.getCmp('samplemodule-grid-item-property');
        let store = grid.getStore();
        store.removeAll();
        Ext.each(this.record.properties, function (item) {
            store.add(new Ext.data.Record(item));
        }, this);
        sampleModule.window.item.superclass.setRecord.call(this);
    },

    beforeSubmit: function (record) {
        let grid = Ext.getCmp('samplemodule-grid-item-property');
        let store = grid.getStore();
        let records = store.getRange();
        let properties = [];
        Ext.each(records, function (rec) {
            properties.push(rec.data);
        }, this);
        this.fp.getForm().setValues({
            properties: Ext.encode(properties)
        });
        return sampleModule.window.item.superclass.beforeSubmit.call(this, record);
    },

    getFields: function (config) {
        return sampleModule.component.tabs([
            {
                title: _('samplemodule_item_data'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    this.getFormInput('name', {fieldLabel: _('samplemodule_name')}),
                    this.getCollectionIdField(config),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_description')}),
                    this.getFormInput('image', {xtype: 'samplemodule-combo-browser-image', fieldLabel: _('samplemodule_item_image'), id: 'image-item'}),
                    this.getFormInput('image_preview', {xtype: 'displayfield', cls: 'formpanel-image', id: 'image-item-preview', fieldLabel: ''}),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_active')}),
                    sampleModule.component.logSection(this.record),
                ],
            }, {
                title: _('samplemodule_properties'),
                items: [
                    sampleModule.component.panelDescription(_('samplemodule_properties_management')),
                    {xtype: 'hidden', name: 'properties'},
                    {xtype: 'samplemodule-grid-item-property'},
                ]
            }
        ]);
    },

    getCollectionIdField: function (config) {
        if (config.collection_id) {
            return {xtype: 'hidden', name: 'collection_id', value: config.collection_id};
        }
        return this.getFormInput('collection_id', {
            xtype: 'ms2colors-combo-select-collection',
            fieldLabel: _('samplemodule_item_collection')
        });
    },
});
Ext.reg('samplemodule-window-item', sampleModule.window.item);
