<?php

$this->loadClass('AbstractObjectUpdateProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionUpdateProcessor extends AbstractObjectUpdateProcessor
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
        $categoryIds = $this->getProperty('categoryids');
        if (!isset($categoryIds)) {
            return;
        }

        $c = $this->modx->newQuery('sampleCollectionCategory');
        $c->command('DELETE');
        $c->where([
            'collection_id' => $this->object->id,
        ]);
        $c->prepare();
        $c->stmt->execute();

        foreach ($categoryIds as $categoryId) {
            if ($categoryId === '') {
                continue;
            }
            $category = $this->modx->newObject('sampleCollectionCategory');
            $category->fromArray(array(
                'category_id' => $categoryId
            ), '', true);
            $this->categories[] = $category;
        }
        if($this->categories) {
            $this->object->addMany($this->categories, 'CategoryIds');
        }
    }
}

return 'sampleCollectionUpdateProcessor';
