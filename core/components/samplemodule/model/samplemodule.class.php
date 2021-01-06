<?php

if (!$this->loadClass('abstractModule', MODX_CORE_PATH . 'components/abstractmodule/model/', true, true)) {
    return false;
}

class sampleModule extends abstractModule
{
    const PKG_VERSION = '1.0.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'samplemodule';
    const TABLE_PREFIX = 'samplemodule_';
    const DEVELOPER_MODE = true;

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $config = parent::getConfig($config);
        return array_merge([
            'fileSource' => $this->modx->getOption($this::PKG_NAMESPACE . '_file_source'),
        ], $config);
    }
}
