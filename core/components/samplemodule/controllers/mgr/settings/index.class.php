<?php

require_once dirname(__DIR__) . '/default.class.php';

class sampleModuleMgrSettingsManagerController extends sampleModuleMgrDefaultController
{
    /** @var string */
    protected $pageTitle = 'settings';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:category',
        'samplemodule:option',
    ];

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/panel.settings.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/grid.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/window.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/category/grid.category.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/window.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/grid.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optionone/window.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/window.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/grid.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/optiontwo/window.optiontwo.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/settings.js');
        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-settings',
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }
}
