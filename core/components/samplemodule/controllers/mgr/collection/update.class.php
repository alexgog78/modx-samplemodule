<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/assets.trait.php';

class sampleModuleMgrCollectionUpdateManagerController extends abstractModuleMgrUpdateController
{
    use sampleModuleControllerHelperAssets;

    /** @var string */
    protected $objectGetProcessorPath = 'mgr/collection/get';

    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'samplemodule_collection_editing';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:collection',
        'samplemodule:item',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/formpanel.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/property/grid.collection.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/property/window.collection.property.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/item/grid.collection.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/property/grid.item.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/property/window.item.property.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/update.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-update',
            'record' => $this->object,
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
