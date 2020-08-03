<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCategoryRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCategoryRemoveProcessor';
