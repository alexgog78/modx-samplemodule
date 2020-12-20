'use strict';

Ext.namespace('jepsGames.grid.test');

jepsGames.grid.test.property = function (config) {
    config = config || {};
    Ext.apply(config, {
        id: 'jepsgames-grid-test-property',
        fields: [
            'key',
            'value'
        ],
        columns: [
            this.getGridColumn('key', {header: _('jepsgames_game_property_key')}),
            this.getGridColumn('value', {header: _('jepsgames_game_property_value')}),
        ],
    });
    jepsGames.grid.test.property.superclass.constructor.call(this, config);
};
Ext.extend(jepsGames.grid.test.property, jepsGames.localGrid, {
    _recordWindow: null,

    createRecord: function (btn, e) {
        this.loadWindow();
        this._recordWindow.show(e.target);
    },

    updateRecord: function (btn, e) {
        this.loadWindow(this.menu.record);
        this._recordWindow.show(e.target);
    },

    removeRecord: function () {
        let key = this.menu.record.key
        let store = this.getStore()
        let idx = store.find('key', key);
        store.removeAt(idx);
    },

    loadWindow: function (record) {
        if (this._recordWindow) {
            this._recordWindow.close();
        }
        this._recordWindow = new MODx.load({
            xtype: 'jepsgames-window-test-property',
            title: _('create'),
            record: record,
            grid: this,
            listeners: {
                success: {
                    fn: this.refresh,
                    scope: this
                }
            }
        });
    }
});
Ext.reg('jepsgames-grid-test-property', jepsGames.grid.test.property);
