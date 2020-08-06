<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionOneCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionOneCreateProcessor';
