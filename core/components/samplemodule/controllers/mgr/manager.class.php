<?php

$this->modx->loadClass('AbstractManagerController', MODX_CORE_PATH . 'components/abstractmodule/controllers/mgr/', true, true);

abstract class SampleModuleManagerController extends AbstractManagerController
{
    /** @var string\bool */
    protected $moduleClass = 'SampleModule';
}
