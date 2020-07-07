<?php

if (!class_exists('AbstractModule')) {
    /** @noinspection PhpIncludeInspection */
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class SampleModule extends AbstractModule
{
    /** @var string */
    protected $tablePrefix = 'samplemodule_';
}
