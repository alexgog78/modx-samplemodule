'use strict';

SampleModule.combo.multiSelectLocal.tag = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true
    });
    SampleModule.combo.multiSelectLocal.tag.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.multiSelectLocal.tag, SampleModule.combo.multiSelectLocal);
Ext.reg('samplemodule-combo-multiselect-tag', SampleModule.combo.multiSelectLocal.tag);
