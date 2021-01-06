'use strict';

sampleModule.combo.multiSelect.local.tag = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,
        dataIndex: 'tags_combo',
    });
    sampleModule.combo.multiSelect.local.tag.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.multiSelect.local.tag, sampleModule.combo.multiSelect.local.abstract);
Ext.reg('samplemodule-combo-multiselect-tag', sampleModule.combo.multiSelect.local.tag);
