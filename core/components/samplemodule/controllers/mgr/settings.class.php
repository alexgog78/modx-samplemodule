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
    }
}
