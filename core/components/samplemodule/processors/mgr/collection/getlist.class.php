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
        if (!$object->option_two_id) {
            $object->set('option_two_id', null);
        }
        $this->prepareTags($object);
        $this->getCategories($object);
        return parent::prepareRow($object);
    }

    /**
     * @param xPDOObject $object
     */
    private function prepareTags(xPDOObject $object)
    {
        $tags = [];
        foreach ($object->get('tags') ?? [] as $value) {
            $tags[] = [
                'value' => $value,
            ];
        }
        $object->set('tags', $tags);
    }

    /**
     * @param xPDOObject $object
     */
    private function getCategories(xPDOObject $object)
    {
        $categories = $object->getCategories();
        $object->set('categories', $categories);
    }
}

return 'sampleCollectionGetListProcessor';
