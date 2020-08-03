<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleTypeRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleType';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleTypeRemoveProcessor';
