<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleTypeGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleType';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleTypeGetListProcessor';
