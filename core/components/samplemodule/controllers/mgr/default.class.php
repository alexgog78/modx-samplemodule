<?php

require_once dirname(__DIR__) . '/helpers/service.trait.php';
require_once dirname(__DIR__) . '/helpers/defaultassets.trait.php';
require_once dirname(__DIR__) . '/helpers/richtext.trait.php';

abstract class sampleModuleMgrDefaultController extends modExtraManagerController
{
    use sampleModuleControllerHelperService;
    use sampleModuleControllerHelperDefaultAssets;
    use sampleModuleControllerHelperRichText;

    /** @var bool */
    protected $developMode = true;

    /** @var string */
    protected $assetsVersion;

    /** @var bool */
    protected $loadRichText = true;

    /** @var array */
    protected $languageTopics = [];

    /** @var string */
    protected $pageTitle = '';

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }
        return null;
    }

    public function initialize()
    {
        $this->service = $this->getService();
        $this->assetsVersion = $this->getAssetsVersion();
        if ($this->loadRichText) {
            $this->loadRichTextEditor();
        }
    }

    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array_merge($this->languageTopics, [
            $this->namespace . ':default',
            $this->namespace . ':status',
        ]);
    }

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon($this->pageTitle) . ' | ' . $this->modx->lexicon($this->namespace);
    }

    public function loadCustomCssJs()
    {
        $this->addCss($this->service->cssUrl . 'mgr/default.css');
        $this->addJavascript($this->service->jsUrl . 'mgr/' . $this->service::PKG_NAMESPACE . '.js');
        $configJs = $this->modx->toJSON($this->service->config ?? []);
        $this->addHtml('<script type="text/javascript">' . get_class($this->service) . '.config = ' . $configJs . ';</script>');

        $this->loadDefaultCssJs();

        $this->addJavascript($this->service->jsUrl . 'mgr/misc/component.list.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/misc/renderer.list.js');

        $this->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optionone.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/select.optiontwo.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.tag.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/combo/multiselect.category.js');
    }

    /**
     * @param string $script
     */
    public function addCss($script)
    {
        $script .= '?' . $this->assetsVersion;
        parent::addCss($script);
    }

    /**
     * @param string $script
     */
    public function addJavascript($script)
    {
        $script .= '?' . $this->assetsVersion;
        parent::addJavascript($script);
    }

    /**
     * @param string $script
     */
    public function addLastJavascript($script)
    {
        $script .= '?' . $this->assetsVersion;
        parent::addLastJavascript($script);
    }

    /**
     * @return string
     */
    protected function getAssetsVersion()
    {
        if ($this->developMode) {
            return time();
        }
        return $this->service::PKG_VERSION . '-' . $this->service::PKG_RELEASE;
    }
}
