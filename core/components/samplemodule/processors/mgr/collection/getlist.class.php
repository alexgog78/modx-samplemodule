<?php

$this->loadClass('AbstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionGetListProcessor extends AbstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

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

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $objectArray = parent::prepareRow($object);
        $objectArray['tags_combo'] = $this->getTagsCombo($object);
        return $objectArray;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    private function getTagsCombo(xPDOObject $object)
    {
        $xtypes = [];
        foreach ($object->get('tags') ?? [] as $value) {
            if ($value === '') {
                continue;
            }
            $xtypes[] = [
                'value' => $value,
            ];
        }
        return $xtypes;
    }
}

return 'sampleCollectionGetListProcessor';
