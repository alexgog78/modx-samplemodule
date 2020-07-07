<?php

if (!class_exists('SampleModuleManagerController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class SampleModuleMgrPanelManagerController extends SampleModuleManagerController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexicon('section.blocks');
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        //$this->addJavascript($this->config['jsUrl'] . 'mgr/widgets/block/grid.js');
        //$this->addLastJavascript($this->config['jsUrl'] . 'mgr/sections/blocks/list.js');

        //$this->module->mgrBase->loadAssets($this);
        /*$this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/producttab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/categorytab/window.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/grid.js');
        $this->addJavascript($this->module->config['jsUrl'] . 'mgr/widgets/settingstab/window.js');*/
        //$this->addLastJavascript($this->module->config['jsUrl'] . 'mgr/sections/fields/list.js');
    }
}
