<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleStatusGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleStatus';

    /** @var string */
    public $objectType = 'samplemodule';
}

return 'sampleStatusGetListProcessor';
