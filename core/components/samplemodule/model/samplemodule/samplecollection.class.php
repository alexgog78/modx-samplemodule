<?php

$this->loadClass('AbstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class sampleCollection extends AbstractSimpleObject
{
    /** @var array */
    public static $searchableFields = [
        'name',
    ];

    /**
     * @return array
     */
    public function getCategories()
    {
        $categories = [];
        $categoryIdsCollection = $this->getMany('CategoryIds');
        foreach ($categoryIdsCollection as $categoryItem) {
            $category = $categoryItem->getOne('Category');
            if (!$category) {
                continue;
            }
            $categories[] = $category->toArray();
        }
        return $categories;
    }
}
