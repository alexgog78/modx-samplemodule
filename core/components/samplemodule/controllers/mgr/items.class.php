<?php

if (!class_exists('SampleMgrController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class SampleModuleMgrItemsManagerController extends SampleMgrController
{
    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexiconTopic('items') . ' | ' . $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/panel.items.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.property.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/item/list.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.load({xtype: "samplemodule-page-item-list"}); });</script>');
    }
}
