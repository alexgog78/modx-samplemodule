'use strict';

Ext.apply(sampleModule.component, {
    logSection: function (record = []) {
        if (!record || record.length === 0) {
            return {};
        }
        return [
            MODx.PanelSpacer,
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
                        sampleModule.component.inputField('created_on', {fieldLabel: _('samplemodule_createdon'), readOnly: true}),
                        sampleModule.component.inputField('created_by', {xtype: 'modx-combo-user', fieldLabel: _('samplemodule_createdby'), readOnly: true}),
                    ]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    defaults: {msgTarget: 'under', border: false, anchor: '100%'},
                    items: [
                        sampleModule.component.inputField('updated_on', {fieldLabel: _('samplemodule_updatedon'), readOnly: true}),
                        sampleModule.component.inputField('updated_by', {xtype: 'modx-combo-user', fieldLabel: _('samplemodule_updatedby'), readOnly: true}),
                    ]
                }]
            }
        ];
    }
});
