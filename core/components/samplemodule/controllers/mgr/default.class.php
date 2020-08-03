<?php

if (!class_exists('SampleMgrController')) {
    require_once __DIR__ . '/manager.class.php';
}

class SampleModuleMgrDefaultManagerController extends SampleMgrController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/panel.default.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/panel.collections.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/window.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/panel.items.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/default.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.add("samplemodule-page-default"); });</script>');
    }
}
