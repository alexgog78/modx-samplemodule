<?php

$this->loadClass('AbstractObjectCreateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionCreateProcessor extends AbstractObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';

    /** @var array */
    private $categories = [];

    /**
     * @return bool
     */
    public function beforeSave()
    {
        $this->setCategories();
        return parent::beforeSave();
    }

    private function setCategories()
    {
        $categoryIds = $this->getProperty('categories');
        if (empty($categoryIds)) {
            return;
        }

        foreach ($categoryIds as $categoryId) {
            if ($categoryId === '') {
                continue;
            }
            $category = $this->modx->newObject('sampleCollectionCategory');
            $category->fromArray([
                'category_id' => $categoryId,
            ], '', true);
            $this->categories[] = $category;
        }
        if ($this->categories) {
            $this->object->addMany($this->categories, 'CategoryIds');
        }
    }
}

return 'sampleCollectionCreateProcessor';
