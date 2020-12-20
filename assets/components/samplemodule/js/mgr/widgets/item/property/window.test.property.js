'use strict';

Ext.namespace('jepsGames.window.test');

jepsGames.window.test.property = function (config) {
    config = config || {};
    Ext.apply(config, {});
    jepsGames.window.test.property.superclass.constructor.call(this, config);
};
Ext.extend(jepsGames.window.test.property, jepsGames.window, {
    getFields: function (config) {
        return [{
            xtype: 'textfield',
            name: 'key',
            fieldLabel: _('jepsgames_game_property_key'),
            anchor: '100%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            name: 'value',
            fieldLabel: _('jepsgames_game_property_value'),
            anchor: '100%',
            allowBlank: false,
        }];
    },

    beforeSubmit: function (record) {
        if (!this.fp.getForm().isValid()) {
            return false;
        }
        return true;
    },

    submit: function (close) {
        let values = this.fp.getForm().getValues();
        let store = this.grid.getStore();
        if (!this.fireEvent('beforeSubmit', values)) {
            return false;
        }
        if (this.config.record && this.config.record.key) {
            let idx = store.find('key', this.config.record.key);
            store.removeAt(idx);
            store.add(new Ext.data.Record(values));
        } else {
            store.add(new Ext.data.Record(values));
        }
        this.close();
    }
});
Ext.reg('jepsgames-window-test-property', jepsGames.window.test.property);
