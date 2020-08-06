<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionOneGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionOneGetListProcessor';
