<?php

$this->loadClass('abstractModule', MODX_CORE_PATH . 'components/abstractmodule/model/', true, true);

class sampleModule extends abstractModule
{
    const PKG_VERSION = '1.0.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'samplemodule';
    const TABLE_PREFIX = 'samplemodule_';
    const DEVELOPER_MODE = true;

    /**
     * @param array $config
     */
    protected function setConfig($config = [])
    {
        parent::setConfig($config);
        $this->config['fileSource'] = $this->getOption('file_source');
        $this->config['sampleDataPath'] = $this->corePath . 'sampledata/';
    }
}
