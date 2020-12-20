<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleCollectionCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var bool */
    protected $softValidate = false;

    /**
     * @return bool
     */
    public function beforeSave()
    {
        $this->setTags();
        $this->setCategories();
        return parent::beforeSave();
    }

    private function setTags()
    {
        $tagsData = $this->getProperty('tags');
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
        $this->object->set('tags', $tags);
    }

    /**
     * @return array|void
     */
    private function setCategories()
    {
        $categoryIds = $this->getProperty('category_ids');
        if (empty($categoryIds)) {
            return;
        }

        $categories = [];
        foreach ($categoryIds as $categoryId) {
            if ($categoryId === '') {
                continue;
            }
            $category = $this->modx->newObject('sampleCollectionCategory');
            $category->fromArray([
                'category_id' => $categoryId,
            ], '', true);
            $categories[] = $category;
        }
        $this->object->addMany($categories, 'CategoryIds');
        return $categories;
    }
}

return 'sampleCollectionCreateProcessor';
