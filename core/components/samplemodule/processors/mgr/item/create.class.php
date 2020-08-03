<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleItemCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleItemCreateProcessor';
