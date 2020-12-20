<?php

require_once dirname(__DIR__) . '/default.class.php';

class SampleModuleMgrItemManagerController extends sampleModuleMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'samplemodule_item_list';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:item',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/panel.items.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/property/grid.item.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/property/window.item.property.js');

        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/item/list.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-item-list',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
