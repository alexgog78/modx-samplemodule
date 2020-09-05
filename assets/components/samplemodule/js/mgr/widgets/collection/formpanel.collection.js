'use strict';

SampleModule.formPanel.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-formpanel-collection';
    }
    Ext.apply(config, {
        url: SampleModule.config.connectorUrl,
        title: _('samplemodule_collection'),
    });
    SampleModule.formPanel.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.formPanel.collection, SampleModule.formPanel.abstract, {
    defaultValues: {
        is_active: 1,
    },
    rteLoaded: false,
    rteElements: 'richtext',

    onReady: function (record) {
        setTimeout(function () {
            this.rteLoaded = true;
            MODx.loadRTE(this.rteElements);
        }.bind(this));
        SampleModule.formPanel.collection.superclass.onReady.call(this);
    },

    getComponents: function (config) {
        let mainForm = this.getMainForm(config);
        let itemsGrid = (config.record) ? {xtype: 'samplemodule-grid-item', collection_id: config.record.id} : SampleModule.component.notice(_('samplemodule_undefined'));
        return [
            this.renderTabsPanel([{
                title: _('samplemodule_collection'),
                items: [
                    this.getContent(mainForm),
                ]
            }, {
                title: _('samplemodule_items'),
                items: [
                    this.getDescription(_('samplemodule_items_management')),
                    this.getContent(itemsGrid),
                ]
            }, {
                title: _('samplemodule_properties'),
                items: [
                    this.getDescription(_('samplemodule_properties_management')),
                    //this.getContent([{xtype: 'samplemodule-grid-item'}])
                ]
            }]),
            this.getContentSection(config)
        ];
    },

    getMainForm: function (config) {
        return [
            {xtype: 'hidden', name: 'id'},
            {
                layout: 'column',
                defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
                        this.getFormInput('option_one_id', {xtype: 'samplemodule-combo-select-optionone', fieldLabel: _('samplemodule_record_optionone')}),
                        this.getFormInput('option_two_id', {xtype: 'samplemodule-combo-select-optiontwo', fieldLabel: _('samplemodule_record_optiontwo')}),
                        this.getFormInput('tags', {xtype: 'samplemodule-combo-multiselect-tag', fieldLabel: _('samplemodule_record_tags')}),
                        this.getFormInput('categoryids', {xtype: 'samplemodule-combo-multiselect-category', fieldLabel: _('samplemodule_record_categories')}),
                    ]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
                        this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_record_description'), height: 239}),
                    ]
                }]
            }
        ];
    },

    getContentSection: function (config) {
        return this.renderPlainPanel([
            this.getDescription(_('samplemodule_content')),
            this.getContent([
                this.getFormInput('richtext', {xtype: 'textarea', id: 'richtext', fieldLabel: _('samplemodule_record_content'), height: 400}),
                this.getFormInput('code', {
                    xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea',
                    mimeType: 'text/html',
                    fieldLabel: _('samplemodule_record_code'),
                    height: 400,
                }),
                SampleModule.component.logSection(this.record),
            ]),
        ]);
    },

    success: function (o) {
        if (!this.record) {
            MODx.loadPage('mgr/collection/update', 'namespace=samplemodule&id=' + o.result.object.id);
        }
        return SampleModule.formPanel.collection.superclass.success.call(this, o);
    },
});
Ext.reg('samplemodule-formpanel-collection', SampleModule.formPanel.collection);
