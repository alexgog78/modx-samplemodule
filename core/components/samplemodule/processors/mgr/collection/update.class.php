<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCollectionUpdateProcessor';
