<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleStatusCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleStatus';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleStatusCreateProcessor';
