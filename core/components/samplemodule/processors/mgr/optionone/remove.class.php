<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleOptionOneRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleOptionOneRemoveProcessor';
