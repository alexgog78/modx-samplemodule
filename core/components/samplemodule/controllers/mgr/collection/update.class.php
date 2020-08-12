<?php

if (!class_exists('SampleMgrController')) {
    require_once dirname(__DIR__) . '/manager.class.php';
}

class SampleModuleMgrCollectionUpdateManagerController extends SampleMgrController
{
    /** @var string */
    protected $recordClassKey = 'sampleCollection';

    /** @var bool */
    protected $loadRichText = true;

    /** @return string */
    public function getPageTitle()
    {
        return $this->getLexiconTopic('editing', [
                'record' => $this->getLexiconTopic('collection'),
            ]) . ' | ' . $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/formpanel.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/update.js');

        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-update',
            'record' => $this->record->toArray(),
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
