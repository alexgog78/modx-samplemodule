<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleTypeUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleType';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleTypeUpdateProcessor';
