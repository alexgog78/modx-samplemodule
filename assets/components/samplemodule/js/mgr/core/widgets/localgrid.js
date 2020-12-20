'use strict';

sampleModule.localGrid = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        deferredRender: true,
        autoHeight: true,
        anchor: '100%',
        fields: [],
        columns: [],
    });
    sampleModule.localGrid.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.localGrid, MODx.grid.LocalGrid, {
    initComponent: function () {
        this.tbar = this.getToolbar();
        sampleModule.localGrid.superclass.initComponent.call(this);
    },

    getGridColumn: function (name, config = {}) {
        return Ext.applyIf(config, {
            dataIndex: name,
            header: name,
        });
    },

    getToolbar: function () {
        return [
            this._getCreateButton(),
        ];
    },

    getMenu: function () {
        return [{
            text: _('edit'),
            handler: this.updateRecord,
            scope: this
        }, '-', {
            text: _('delete'),
            handler: this.removeRecord,
            scope: this
        }];
    },

    _getCreateButton: function (config = {}) {
        return this._getButton(_('add'), {
            handler: this.createRecord,
            scope: this
        });
    },

    _getButton: function (text, config = {}) {
        return Ext.applyIf(config, {
            xtype: 'button',
            text: text,
            cls: 'primary-button',
            scope: this
        });
    },
});
