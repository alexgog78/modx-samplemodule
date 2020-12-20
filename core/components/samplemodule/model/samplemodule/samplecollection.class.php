<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';
require_once dirname(__DIR__) . '/helpers/timestamps.trait.php';

class sampleCollection extends xPDOSimpleObject
{
    use sampleModuleModelHelperMenuindex;
    use sampleModuleModelHelperTimestamps;

    /**
     * @param null $cacheFlag
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        $this->setTimestamps();
        $this->setTags();
        $this->saveCategories();
        return parent::save($cacheFlag);
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->xpdo->getCollectionGraph('sampleCategory', '{"CollectionIds":{}}', ['CollectionIds.collection_id' => $this->get('id')]);
    }

    private function setTags()
    {
        $tagsData = $this->get('tags');
        if (!isset($tagsData)) {
            return;
        }

        $tags = [];
        foreach ($tagsData as $tag) {
            if ($tag === '') {
                continue;
            }
            $tags[] = $tag;
        }
        $this->set('tags', $tags);
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
}
