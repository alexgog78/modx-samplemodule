<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleOptionOne extends abstractSimpleObject
{
    /** @var bool */
    protected $timestamps = false;
}
