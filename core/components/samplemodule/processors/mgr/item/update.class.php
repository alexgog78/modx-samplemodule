<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleItemUpdateProcessor extends AbstractObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleItemUpdateProcessor';
