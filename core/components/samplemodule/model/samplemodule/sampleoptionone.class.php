<?php

$this->loadClass('AbstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleOptionOne extends AbstractSimpleObject
{
    /** @var string|null */
    public static $createdOnField = null;

    /** @var string|null */
    public static $createdByField = null;

    /** @var string|null */
    public static $updatedOnField = null;

    /** @var string|null */
    public static $updatedByField = null;

    /** @var array */
    public static $searchableFields = [
        'name',
    ];
}
