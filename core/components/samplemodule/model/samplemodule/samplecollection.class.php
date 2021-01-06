<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleCollection extends abstractSimpleObject
{
    /**
     * @param null $cacheFlag
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        $this->saveCategories();
        return parent::save($cacheFlag);
    }

    /**
     * @return array|void
     */
    private function saveCategories()
    {
        $categoryIds = $this->get('category_ids');
        if (!isset($categoryIds)) {
            return;
        }

        if (!$this->_new) {
            $c = $this->xpdo->newQuery('sampleCollectionCategory');
            $c->command('DELETE');
            $c->where([
                'collection_id' => $this->get('id'),
            ]);
            $c->prepare();
            $c->stmt->execute();
        }

        $categories = [];
        foreach ($categoryIds as $categoryId) {
            if ($categoryId === '') {
                continue;
            }
            $category = $this->xpdo->newObject('sampleCollectionCategory');
            $category->fromArray([
                'category_id' => $categoryId,
            ], '', true);
            $categories[] = $category;
        }
        $this->addMany($categories, 'CategoryIds');
        return $categories;
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->xpdo->getCollectionGraph('sampleCategory', '{"CollectionIds":{}}', ['CollectionIds.collection_id' => $this->get('id')]);
    }
}
