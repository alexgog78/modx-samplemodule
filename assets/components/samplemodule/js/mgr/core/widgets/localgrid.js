'use strict';

sampleModule.localGrid.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        /*fields: [
            'key',
            'value'
        ],
        columns: [
            {header: _('jpayments.field.key'), dataIndex: 'key', sortable: false, width: 0.3},
            {header: _('jpayments.field.value'), dataIndex: 'value', sortable: false, width: 0.7}
        ]*/

        //Custom settings
        fields: [],
        columns: [],

        //Core settings
        tbar: [],
        //anchor: '100%',
    });
    sampleModule.localGrid.abstract.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.localGrid.abstract, MODx.grid.LocalGrid, {


    initComponent: function () {
        this.columns = this._getGridColumns();
        this.tbar = this.getToolbar();
        /*this.viewConfig = Ext.applyIf(this.config.viewConfig, {
            getRowClass: this.getRowClass
        });*/
        sampleModule.localGrid.abstract.superclass.initComponent.call(this);
    },

    getToolbar: function () {
        return [
            this.getCreateButton(),
            '->',
            //this.getSearchPanel()
        ];
    },



    getCreateButton: function (config = {}) {
        return Ext.applyIf(config, {
            text: _('add'),
            cls: 'primary-button',
            //handler: this._quickCreateRecord,
            scope: this
        });
    },

    getGridColumn: function (name, config = {}) {
        return sampleModule.component.gridColumn(name, config);
    },

    _getGridColumns: function () {
        if (this.config.columns.length > 0) {
            return this.config.columns;
        }
        Ext.each(this.config.fields, function (field) {
            this.config.columns.push(this.getGridColumn(field));
        }, this);
        return this.config.columns;
    },


});
