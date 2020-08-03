<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleStatusUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleStatus';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleStatusUpdateProcessor';
