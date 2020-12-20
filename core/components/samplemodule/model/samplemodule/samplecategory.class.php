<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';

class sampleCategory extends xPDOSimpleObject
{
    use sampleModuleModelHelperMenuindex;

    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        return parent::save($cacheFlag);
    }
}
