<?php

if (!class_exists('SampleMgrController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class SampleModuleMgrSettingsManagerController extends SampleMgrController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('settings');
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/panel.settings.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/grid.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/window.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/grid.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/window.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/grid.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/window.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/window.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/grid.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/window.optiontwo.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/settings.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.add("samplemodule-page-settings"); });</script>');
    }
}
