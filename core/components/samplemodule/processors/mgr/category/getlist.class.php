<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCategoryGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCategoryGetListProcessor';
