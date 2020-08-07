<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCategoryGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var string */
    public $objectType = 'samplemodule';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    protected function comboQuery(xPDOQuery $c)
    {
        $c->where(['is_active' => 1]);
        return parent::comboQuery($c);
    }
}

return 'sampleCategoryGetListProcessor';
