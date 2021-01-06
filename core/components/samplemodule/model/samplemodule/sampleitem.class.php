<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleItem extends abstractSimpleObject
{
    /**
     * @return array
     */
    protected function getMenuindexConditions()
    {
        return [
            'collection_id' => $this->get('collection_id'),
        ];
    }
}
