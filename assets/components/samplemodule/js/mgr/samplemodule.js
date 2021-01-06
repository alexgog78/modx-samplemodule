'use strict';

var sampleModule = function (config) {
    config = config || {};
    sampleModule.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule, Ext.Component, abstractModule);
Ext.reg('samplemodule', sampleModule);
sampleModule = new sampleModule();
