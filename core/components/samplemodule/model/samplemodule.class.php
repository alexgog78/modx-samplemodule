<?php

require_once dirname(__DIR__) . '/helpers/log.trait.php';
require_once dirname(__DIR__) . '/helpers/event.trait.php';

class sampleModule
{
    use sampleModuleHelperLog;
    use sampleModuleHelperEvent;

    const PKG_VERSION = '1.0.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'samplemodule';
    const TABLE_PREFIX = 'samplemodule_';

    /** @var modX */
    public $modx;

    /** @var array */
    public $config = [];

    /**
     * SampleModule constructor.
     *
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX $modx, array $config = [])
    {
        $this->modx = $modx;
        $this->config = $this->getConfig($config);
        $this->modx->addPackage(self::PKG_NAMESPACE, $this->modelPath, self::TABLE_PREFIX);
        $this->modx->lexicon->load(self::PKG_NAMESPACE . ':default');
    }

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

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $corePath = $this->modx->getOption(self::PKG_NAMESPACE . '.core_path', $config, MODX_CORE_PATH . 'components/' . self::PKG_NAMESPACE . '/');
        $assetsPath = $this->modx->getOption(self::PKG_NAMESPACE . '.assets_path', $config, MODX_ASSETS_PATH . 'components/' . self::PKG_NAMESPACE . '/');
        $assetsUrl = $this->modx->getOption(self::PKG_NAMESPACE . '.assets_url', $config, MODX_ASSETS_URL . 'components/' . self::PKG_NAMESPACE . '/');
        return array_merge([
            'corePath' => $corePath,
            'assetsPath' => $assetsPath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'fileSource' => $this->modx->getOption('samplemodule_file_source'),
        ], $config);
    }
}
