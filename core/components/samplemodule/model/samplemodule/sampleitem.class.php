<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';
require_once dirname(__DIR__) . '/helpers/timestamps.trait.php';

class sampleItem extends xPDOSimpleObject
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
     * @return array
     */
    private function getMenuindexConditions()
    {
        return [
            'collection_id' => $this->get('collection_id'),
        ];
    }
}
