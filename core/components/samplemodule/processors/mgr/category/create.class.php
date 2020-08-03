<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCategoryCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCategoryCreateProcessor';
