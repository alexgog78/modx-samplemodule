<?php

if (!class_exists('SampleMgrController')) {
    require_once dirname(__DIR__) . '/manager.class.php';
}

class SampleModuleMgrCollectionCreateManagerController extends SampleMgrController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexiconTopic('creating', [
            'record' => $this->getLexiconTopic('collection')
        ]) . ' | ' . $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/formpanel.collection.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/create.js');
        $this->addHtml('<script type="text/javascript">Ext.onReady(function() { MODx.load({xtype: "samplemodule-page-collection-create"}); });</script>');
    }
}
