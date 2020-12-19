'use strict';

var sampleModule = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    sampleModule.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule, Ext.Component, {
    config: {},
    page: {},
    panel: {},
    formPanel: {},
    grid: {},
    localGrid: {},
    window: {},
    tree: {},
    combo: {},
    component: {},
    renderer: {},
    function: {},
});
Ext.reg('samplemodule', sampleModule);
sampleModule = new sampleModule();
