'use strict';

sampleModule.formPanel.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        url: null,
        baseParams: {
            action: null
        },
        title: null,
        components: [],
        record: null,

        //Core settings
        items: [],
        cls: 'container form-with-labels',
        listeners: {
            'setup': {fn: this.setup, scope: this},
            'success': {fn: this.success, scope: this},
            'beforeSubmit': {fn: this.beforeSubmit, scope: this}
        },
    });
    sampleModule.formPanel.abstract.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.formPanel.abstract, MODx.FormPanel, {
    defaultValues: {},

    initComponent: function() {
        if (this.items.length == 0) {
            if (this.title) {
                this.items.push(this._getHeader(this.title));
                this.title = '';
            }
            this.components = this.getComponents(this.initialConfig);
            this.items.push(this.components);
        }
        sampleModule.formPanel.abstract.superclass.initComponent.call(this);
    },

    setup: function () {
        if (!this.record) {
            this.setDefaultValues();
        } else {
            this.setRecord();
        }
        this.fireEvent('ready', this.record);
        MODx.fireEvent('ready');
    },

    setDefaultValues: function() {
        this.getForm().setValues(this.defaultValues);
    },

    setRecord: function() {
        this.getForm().setValues(this.record);
    },

    success: function (o) {
        this.record = o.result.object;
        return true;
    },

    beforeSubmit: function (o) {
        return true;
    },

    getComponents: function (config) {
        return this.components;
    },

    renderPlainPanel: function (items) {
        return {
            cls: 'x-form-label-left',
            items: items,
        };
    },

    renderTabsPanel: function (items) {
        return sampleModule.component.tabs(items, {
            bodyCssClass: 'tab-panel-wrapper'
        });
    },

    getDescription: function (html, config = {}) {
        return sampleModule.component.panelDescription(html, config);
    },

    getContent: function (items, config = {}) {
        return sampleModule.component.panelContent(items, config);
    },

    getFormInput: function (name, config = {}) {
        return sampleModule.component.inputField(name, config);
    },

    _getHeader: function (html) {
        return sampleModule.component.panelHeader(html);
    },
});
