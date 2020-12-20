<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';

class sampleOptionTwo extends xPDOSimpleObject
{
    use sampleModuleModelHelperMenuindex;

    /**
     * @param null $cacheFlag
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        return parent::save($cacheFlag);
    }
}
