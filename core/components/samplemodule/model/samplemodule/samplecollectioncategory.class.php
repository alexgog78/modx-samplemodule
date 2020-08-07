<?php

$this->loadClass('AbstractObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleCollectionCategory extends AbstractObject
{
    /** @var string|null */
    public static $createdOnField = null;

    /** @var string|null */
    public static $createdByField = null;

    /** @var string|null */
    public static $updatedOnField = null;

    /** @var string|null */
    public static $updatedByField = null;
}
