'use strict';

var SampleModule = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    SampleModule.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule, Ext.Component, abstractModule);
Ext.reg('samplemodule', SampleModule);
SampleModule = new SampleModule();
