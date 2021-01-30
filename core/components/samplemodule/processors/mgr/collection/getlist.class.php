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
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryBeforeCount($c);
        $categoryId = $this->getProperty('category_id');
        if ($categoryId) {
            $c->innerJoin('sampleCollectionCategory', 'sampleCollectionCategory', $this->classKey . '.' . $this->primaryKeyField . ' = sampleCollectionCategory.collection_id && sampleCollectionCategory.category_id = ' . $categoryId);
        }
        return $c;
    }

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
     * @param array $list
     * @return array
     */
    public function beforeIteration(array $list)
    {
        $isFilter = $this->getProperty('filter') ? true : false;
        if ($isFilter) {
            $list[] = [
                'id' => 0,
                'name' => '(' . $this->modx->lexicon($this->objectType . '_all') . ')',
            ];
        }
        return parent::beforeIteration($list);
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
