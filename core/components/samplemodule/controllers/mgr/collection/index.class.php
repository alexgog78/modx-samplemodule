<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/default.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/assets.trait.php';

class sampleModuleMgrCollectionManagerController extends abstractModuleMgrDefaultController
{
    use sampleModuleControllerHelperAssets;

    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'samplemodule_collection_list';

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
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/property/grid.collection.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/property/window.collection.property.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/list.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
