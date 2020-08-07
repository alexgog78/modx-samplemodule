<?php

if (!class_exists('AbstractModule')) {
    /** @noinspection PhpIncludeInspection */
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class SampleModule extends AbstractModule
{
    /** @var string */
    protected $tablePrefix = 'samplemodule_';

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $config['imageFileSource'] = $this->modx->getOption('samplemodule_image_file_source', [], $this->modx->getOption('default_media_source'), true);
        return parent::getConfig($config);
    }
}
