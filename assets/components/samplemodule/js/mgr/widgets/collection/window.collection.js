'use strict';

SampleModule.window.collection = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: SampleModule.config.connectorUrl,
    });
    SampleModule.window.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.window.collection, SampleModule.window.abstract, {
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
                    {
                        html: '<hr />',
                    },
                    {
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
                title: _('samplemodule_tab_content'),
                items: [
                    this.getFormInput('richtext', {xtype: 'textarea', id: 'richtext', fieldLabel: _('samplemodule_record_content')}),
                    this.getFormInput('code', {
                        xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea',
                        mimeType: 'text/html',
                        fieldLabel: _('samplemodule_record_code'),
                        height: 150,
                    })
                ]
            }, {
                title: _('samplemodule_tab_options'),
            }
        ]);
    },

    beforeshow: function () {
        MODx.loadRTE('richtext');
        SampleModule.window.collection.superclass.beforeshow.call(this);
    },

    onhide: function () {
        if (tinymce) {
            tinymce.get('richtext').remove();
        }
        SampleModule.window.collection.superclass.onhide.call(this);
    },
});
Ext.reg('samplemodule-window-collection', SampleModule.window.collection);
