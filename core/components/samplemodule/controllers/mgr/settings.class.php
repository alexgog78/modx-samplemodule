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
        //$this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        //$this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/settings.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.add("samplemodule-page-settings"); });</script>');
    }
}
