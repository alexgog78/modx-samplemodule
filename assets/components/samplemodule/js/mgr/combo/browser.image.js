'use strict';

sampleModule.combo.browser.image = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: sampleModule.config.imageFileSource
    });
    sampleModule.combo.browser.image.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.browser.image, sampleModule.combo.browser, {});
Ext.reg('samplemodule-combo-browser-image', sampleModule.combo.browser.image);
