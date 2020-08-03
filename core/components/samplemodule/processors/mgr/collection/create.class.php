<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCollectionCreateProcessor';
