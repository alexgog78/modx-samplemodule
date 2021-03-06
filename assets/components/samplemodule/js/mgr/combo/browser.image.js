'use strict';

sampleModule.combo.browser.image = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: sampleModule.config.fileSource
    });
    sampleModule.combo.browser.image.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.browser.image, sampleModule.combo.browser.abstract);
Ext.reg('samplemodule-combo-browser-image', sampleModule.combo.browser.image);
