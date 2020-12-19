<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleModuleMgrCollectionCreateManagerController extends sampleModuleMgrCreateController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'collection_creating';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:collection'
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/formpanel.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.property.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/create.js');

        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-create',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
