<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/create.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/assets.trait.php';

class sampleModuleMgrCollectionCreateManagerController extends abstractModuleMgrCreateController
{
    use sampleModuleControllerHelperAssets;

    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'samplemodule_collection_creating';

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

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/create.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-create',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
