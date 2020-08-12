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
Ext.extend(SampleModule.formPanel.collection, abstractModule.formPanel.abstract, {
    defaultValues: {
        is_active: 1,
    },

    getComponents: function (config) {
        let mainForm = this.getMainForm(config);
        let itemsGrid = (config.record) ? {xtype: 'samplemodule-grid-item', collection_id: config.record.id} : SampleModule.component.notice(_('samplemodule_undefined'));
        return this.renderTabsPanel([{
            title: _('samplemodule_collection'),
            items: [
                this.getContent(mainForm)
            ]
        }, {
            title: _('samplemodule_items'),
            items: [
                this.getDescription(_('samplemodule_items_management')),
                this.getContent(itemsGrid),
            ]
        }, {
            title: _('samplemodule_user_options'),
            items: [
                this.getDescription(_('samplemodule_user_options_management')),
                //this.getContent([{xtype: 'samplemodule-grid-item'}])
            ]
        }]);
    },

    getMainForm: function (config) {
        return [
            {xtype: 'hidden', name: 'id'},
            this.getFormInput('name', {fieldLabel: _('samplemodule_record_name')}),
            this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_record_description')}),
            {
                layout: 'column',
                defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('option_one_id', {xtype: 'samplemodule-combo-select-optionone', fieldLabel: _('samplemodule_record_optionone')})
                    ]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        this.getFormInput('option_two_id', {xtype: 'samplemodule-combo-select-optiontwo', fieldLabel: _('samplemodule_record_optiontwo')})
                    ]
                }]
            },
            this.getFormInput('tags', {xtype: 'samplemodule-combo-multiselect-tag', fieldLabel: _('samplemodule_record_tags')}),
            this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_record_active')}),
        ];
    },

    success: function (o) {
        if (!this.record) {
            MODx.loadPage('mgr/collection/update', 'namespace=samplemodule&id=' + o.result.object.id);
        }
        return SampleModule.formPanel.collection.superclass.success.call(this, o);
    }
});
Ext.reg('samplemodule-formpanel-collection', SampleModule.formPanel.collection);
