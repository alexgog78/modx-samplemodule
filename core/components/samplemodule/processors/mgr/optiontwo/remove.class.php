<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionTwoRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionTwoRemoveProcessor';
