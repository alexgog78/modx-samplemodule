<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionTwoGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionTwoGetListProcessor';
