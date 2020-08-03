<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleItemGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleItemGetListProcessor';
