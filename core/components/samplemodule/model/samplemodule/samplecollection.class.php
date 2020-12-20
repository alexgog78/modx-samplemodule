<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';
require_once dirname(__DIR__) . '/helpers/timestamps.trait.php';

class sampleCollection extends xPDOSimpleObject
{
    use sampleModuleModelHelperMenuindex;
    use sampleModuleModelHelperTimestamps;

    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        $this->setTimestamps();
        return parent::save($cacheFlag);
    }
}
