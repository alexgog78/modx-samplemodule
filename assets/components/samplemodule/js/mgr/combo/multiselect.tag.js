'use strict';

sampleModule.combo.multiSelectLocal.tag = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,
        dataIndex: 'tags_combo',
    });
    sampleModule.combo.multiSelectLocal.tag.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.multiSelectLocal.tag, sampleModule.combo.multiSelectLocal.abstract);
Ext.reg('samplemodule-combo-multiselect-tag', sampleModule.combo.multiSelectLocal.tag);
