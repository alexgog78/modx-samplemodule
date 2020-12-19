<?php

require_once dirname(__DIR__) . '/default.class.php';

class sampleModuleMgrCollectionManagerController extends sampleModuleMgrDefaultController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'collection_list';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:collection',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/panel.collections.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/window.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.property.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/list.js');

        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
