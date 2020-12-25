'use strict';

var sampleModule = function (config) {
    config = config || {};
    Ext.applyIf(config, {
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
    sampleModule.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule, Ext.Component);
Ext.reg('samplemodule', sampleModule);
sampleModule = new sampleModule();
