<?php

if (!class_exists('SampleMgrController')) {
    require_once dirname(__FILE__) . '/manager.class.php';
}

class SampleModuleMgrCollectionsManagerController extends SampleMgrController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexiconTopic('collections') . ' | ' . $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/panel.collections.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/window.collection.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/list.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.load({xtype: "samplemodule-page-collection-list"}); });</script>');
    }
}
