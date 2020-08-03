<?php

$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleStatusRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleStatus';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleStatusRemoveProcessor';
