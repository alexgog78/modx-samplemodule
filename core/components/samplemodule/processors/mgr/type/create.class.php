<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleTypeCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleType';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleTypeCreateProcessor';
