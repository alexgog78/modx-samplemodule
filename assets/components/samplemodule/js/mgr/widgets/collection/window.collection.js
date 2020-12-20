'use strict';

sampleModule.window.collection = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: sampleModule.config.connectorUrl,
        width: 800,
    });
    sampleModule.window.collection.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.window.collection, sampleModule.window.abstract, {
    defaultValues: {
        is_active: 1,
    },
    rteLoaded: false,
    rteElements: 'richtext',

    getFields: function(config) {
        return sampleModule.component.tabs([
            {
                title: _('samplemodule_collection_data'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    this.getFormInput('name', {fieldLabel: _('samplemodule_name')}),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('samplemodule_description')}),
                    {
                        layout: 'column',
                        defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                        items: [{
                            columnWidth: .5,
                            layout: 'form',
                            defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                            items: [
                                this.getFormInput('option_one_id', {xtype: 'samplemodule-combo-select-optionone', fieldLabel: _('samplemodule_collection_optionone')})
                            ]
                        }, {
                            columnWidth: .5,
                            layout: 'form',
                            defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                            items: [
                                this.getFormInput('option_two_id', {xtype: 'samplemodule-combo-select-optiontwo', fieldLabel: _('samplemodule_collection_optiontwo')})
                            ]
                        }]
                    },
                    this.getFormInput('categoryids', {xtype: 'samplemodule-combo-multiselect-category', fieldLabel: _('samplemodule_collection_categories')}),
                    this.getFormInput('tags', {xtype: 'samplemodule-combo-multiselect-tag', fieldLabel: _('samplemodule_collection_tags')}),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('samplemodule_active')}),
                    sampleModule.component.logSection(this.record),
                ],
            }, {
                title: _('samplemodule_collection_content'),
                items: [
                    this.getFormInput('richtext', {xtype: 'textarea', id: 'richtext', fieldLabel: _('samplemodule_collection_content')}),
                    this.getFormInput('code', {
                        xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea',
                        mimeType: 'text/html',
                        fieldLabel: _('samplemodule_record_code'),
                        height: 150,
                    })
                ]
            }, {
                title: _('samplemodule_properties'),
            }
        ]);
    },

    beforeshow: function () {
        this.rteLoaded = true;
        MODx.loadRTE(this.rteElements);
        sampleModule.window.collection.superclass.beforeshow.call(this);
    },

    onhide: function () {
        if (tinymce) {
            tinymce.get(this.rteElements).remove();
        }
        sampleModule.window.collection.superclass.onhide.call(this);
    },
});
Ext.reg('samplemodule-window-collection', sampleModule.window.collection);
