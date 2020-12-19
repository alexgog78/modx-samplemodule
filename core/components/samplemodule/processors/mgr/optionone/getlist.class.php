<?php

require_once dirname(__DIR__) . '/getlist.class.php';

class sampleOptionOneGetListProcessor extends sampleModuleGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneGetListProcessor';
