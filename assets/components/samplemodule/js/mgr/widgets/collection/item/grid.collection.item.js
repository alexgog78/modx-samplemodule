'use strict';

sampleModule.grid.collectionItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'samplemodule-grid-collectionitem';
    }
    Ext.applyIf(config, {});
    sampleModule.grid.collectionItem.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.grid.collectionItem, sampleModule.grid.item, {
    initComponent: function () {
        this.baseParams.collection_id = this.config.collection_id;
        sampleModule.grid.collectionItem.superclass.initComponent.call(this);
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
Ext.reg('samplemodule-grid-collectionitem', sampleModule.grid.collectionItem);
