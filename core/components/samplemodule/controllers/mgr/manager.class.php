<?php

$this->modx->loadClass('AbstractMgrController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true);

abstract class SampleMgrController extends AbstractMgrController
{
    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.tag.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.category.js');
    }
}
