<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionTwoCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionTwoCreateProcessor';
