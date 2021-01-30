'use strict';

Ext.namespace('sampleModule.grid.collection');

sampleModule.grid.collection.item = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collection-item';
    }
    Ext.applyIf(config, {});
    sampleModule.grid.collection.item.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.collection.item, sampleModule.grid.item, {
    initComponent: function () {
        this.baseParams.collection_id = this.config.collection_id;
        sampleModule.grid.collection.item.superclass.initComponent.call(this);
    },

    getSearchPanel: function () {
        return [
            this._getSearchField(),
            this._getClearSearchButton()
        ];
    },

    _filterClear: function () {
        this.getStore().baseParams.collection_id = this.config.collection_id;
        sampleModule.grid.item.superclass._filterClear.call(this);
    },
});
Ext.reg('samplemodule-grid-collection-item', sampleModule.grid.collection.item);
