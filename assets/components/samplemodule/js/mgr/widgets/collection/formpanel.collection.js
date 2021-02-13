'use strict';

sampleModule.formPanel.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-formpanel-collection';
    }
    Ext.apply(config, {
        url: sampleModule.config.connectorUrl,
        title: config.record 
            ? _('samplemodule_collection_editing') 
            : _('samplemodule_collection_creating')
    });
    sampleModule.formPanel.collection.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.formPanel.collection, sampleModule.formPanel.abstract, {
    defaultValues: {
        is_active: 1,
    },
    rteLoaded: false,
    rteElements: 'richtext',

    setRecord: function () {
        let grid = Ext.getCmp('samplemodule-grid-collectionproperty');
        let store = grid.getStore();
        store.removeAll();
        Ext.each(this.record.properties, function (item) {
            store.add(new Ext.data.Record(item));
        }, this);
        sampleModule.formPanel.collection.superclass.setRecord.call(this);
    },

    onReady: function (record) {
        setTimeout(function () {
            this.rteLoaded = true;
            MODx.loadRTE(this.rteElements);
        }.bind(this));
        sampleModule.formPanel.collection.superclass.onReady.call(this);
    },

    beforeSubmit: function (o) {
        let grid = Ext.getCmp('samplemodule-grid-collectionproperty');
        let store = grid.getStore();
        let records = store.getRange();
        let properties = [];
        Ext.each(records, function (rec, idx, list) {
            properties.push(rec.data);
        }, this);
        o.form.setValues({
            properties: Ext.encode(properties)
        });
        return sampleModule.formPanel.collection.superclass.beforeSubmit.call(this, o);
    },

    success: function (o) {
        if (!this.record) {
            MODx.loadPage('mgr/collection/update', 'namespace=samplemodule&id=' + o.result.object.id);
        }
        return sampleModule.formPanel.collection.superclass.success.call(this, o);
    },

    getComponents: function (config) {
        return [
            this.renderTabsPanel([{
                title: _('samplemodule_collection_data'),
                items: this.getMainSection(config)
            }, {
                title: _('samplemodule_item_list'),
                items: this.getItemsSection(config),
            }, {
                title: _('samplemodule_properties'),
                items: this.getPropertiesSection(config),
            }]),
            this.getContentSection(config),
        ];
    },

    getMainSection: function (config) {
        return this.getContent([
            {xtype: 'hidden', name: 'id'},
            {
                layout: 'column',
                defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('name', {fieldLabel: _('samplemodule_name')}),
                        this.getFormInput('option_one_id', {xtype: 'samplemodule-combo-select-optionone', fieldLabel: _('samplemodule_collection_optionone')}),
                        this.getFormInput('option_two_id', {xtype: 'samplemodule-combo-select-optiontwo', fieldLabel: _('samplemodule_collection_optiontwo')}),
                        this.getFormInput('tags', {xtype: 'samplemodule-combo-multiselect-tag', fieldLabel: _('samplemodule_collection_tags')}),
                        this.getFormInput('category_ids', {xtype: 'samplemodule-combo-multiselect-category', fieldLabel: _('samplemodule_collection_categories')}),
                    ]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_active')}),
                        this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_description'), height: 239}),
                    ]
                }]
            }
        ]);
    },

    getItemsSection: function (config) {
        let itemsGrid = (config.record)
            ? {xtype: 'samplemodule-grid-collectionitem', collection_id: config.record.id}
            : sampleModule.component.notice(_('samplemodule_undefined'));
        return [
            this.getDescription(_('samplemodule_item_list_management')),
            this.getContent(itemsGrid),
        ];
    },

    getPropertiesSection: function (config) {
        return [
            this.getDescription(_('samplemodule_properties_management')),
            this.getContent([
                {xtype: 'hidden', name: 'properties'},
                {xtype: 'samplemodule-grid-collectionproperty'},
            ])
        ];
    },

    getContentSection: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('samplemodule_collection_content')),
            this.getContent([
                this.getFormInput('richtext', {xtype: 'textarea', id: 'richtext', fieldLabel: _('samplemodule_collection_richtext'), height: 400}),
                this.getFormInput('code', {
                    xtype: Ext.ComponentMgr.isRegistered('modx-texteditor')
                        ? 'modx-texteditor'
                        : 'textarea',
                    mimeType: 'text/html',
                    fieldLabel: _('samplemodule_collection_code'),
                    height: 400,
                }),
                sampleModule.component.logSection(this.record),
            ]),
        ]);
    },
});
Ext.reg('samplemodule-formpanel-collection', sampleModule.formPanel.collection);
