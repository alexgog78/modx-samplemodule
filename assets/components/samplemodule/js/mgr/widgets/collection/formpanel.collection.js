'use strict';

SampleModule.formPanel.collection = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-formpanel-collection';
    }
    Ext.apply(config, {
        //title: 'zzzz',

        items: [
            SampleModule.component.panelHeader('1111'),
            {
                html: 'zzzzz'
                ,id: 'modx-user-header'
                ,xtype: 'modx-header'
            }
        ]

        //Custom settings
        //id: 'webwidgets-formpanel-chunk',
        //tabs: true,
        /*url: SampleModule.config.connectorUrl,
        baseParams: {
            actionGet: 'mgr/chunk/get'
        },
        pageHeader: _('webwidgets.section.chunk'),
        panelContent: [],*/
    });
    SampleModule.formPanel.collection.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.formPanel.collection, MODx.FormPanel, {
    /*initComponent: function () {
        console.log(this);
        abstractModule.formPanel.collection.superclass.initComponent.call(this);
    },*/
});
Ext.reg('samplemodule-formpanel-collection', SampleModule.formPanel.collection);
