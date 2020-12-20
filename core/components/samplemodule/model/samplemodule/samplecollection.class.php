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
        return parent::save($cacheFlag);
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->xpdo->getCollectionGraph('sampleCategory', '{"CollectionIds":{}}', ['CollectionIds.collection_id' => $this->get('id')]);
    }
}
