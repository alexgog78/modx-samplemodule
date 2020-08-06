<?php

$this->loadClass('AbstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleCollection extends AbstractSimpleObject
{
    /** @var array */
    protected $searchableFields = [
        'name',
    ];
}
