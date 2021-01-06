<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/getlist.class.php';

class sampleCollectionGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCollection';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryAfterCount($c);
        $c->select([
            'items_count' => '(SELECT COUNT(*) FROM ' . $this->modx->getTableName('sampleItem') . ' WHERE collection_id = ' . $this->classKey . '.' . $this->primaryKeyField . ')',
        ]);
        return $c;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $this->prepareTagsCombo($object);
        $this->getCategories($object);
        return parent::prepareRow($object);
    }

    /**
     * @param xPDOObject $object
     */
    private function prepareTagsCombo(xPDOObject $object)
    {
        $tags = [];
        foreach ($object->get('tags') ?? [] as $value) {
            $tags[] = [
                'value' => $value,
            ];
        }
        $object->set('tags_combo', $tags);
    }

    /**
     * @param xPDOObject $object
     */
    private function getCategories(xPDOObject $object)
    {
        $collection = $object->getCategories();
        $categories = [];
        foreach ($collection as $category) {
            $categories[] = $category->toArray();
        }
        $object->set('categories', $categories);
    }
}

return 'sampleCollectionGetListProcessor';
