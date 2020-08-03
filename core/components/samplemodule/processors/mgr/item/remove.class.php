<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleItemRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleItemRemoveProcessor';
