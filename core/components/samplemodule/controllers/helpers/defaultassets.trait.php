<?php

trait sampleModuleControllerHelperDefaultAssets
{
    protected function loadDefaultCssJs()
    {
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/panel.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/formpanel.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/grid.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/localgrid.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/window.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/widgets/page.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.local.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.local.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.remote.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.remote.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/combo/browser.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/renderer.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/function.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/core/misc/component.list.js');
    }
}
