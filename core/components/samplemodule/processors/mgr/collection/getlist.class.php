<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleCollectionGetListProcessor';
