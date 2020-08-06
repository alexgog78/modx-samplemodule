<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionTwoUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionTwoUpdateProcessor';
