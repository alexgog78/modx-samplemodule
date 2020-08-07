<?php

$this->loadClass('AbstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleCollection extends AbstractSimpleObject
{
    /** @var array */
    public static $searchableFields = [
        'name',
    ];
}
