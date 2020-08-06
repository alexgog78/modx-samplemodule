<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionOneUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionOneUpdateProcessor';
