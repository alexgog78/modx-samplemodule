<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCategoryUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCategoryUpdateProcessor';
