<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCollectionRemoveProcessor';
