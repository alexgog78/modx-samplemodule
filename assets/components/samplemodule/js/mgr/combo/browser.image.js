'use strict';

SampleModule.combo.browser.image = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: SampleModule.config.imageFileSource
    });
    SampleModule.combo.browser.image.superclass.constructor.call(this, config);
};
Ext.extend(SampleModule.combo.browser.image, SampleModule.combo.browser, {});
Ext.reg('samplemodule-combo-browser-image', SampleModule.combo.browser.image);
