<?php

trait sampleModuleControllerHelperAssets
{
    protected function loadDefaultCssJs()
    {
        parent::loadDefaultCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.tag.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.category.js');
    }
}
