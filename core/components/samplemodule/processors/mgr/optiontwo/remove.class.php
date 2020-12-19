<?php

require_once dirname(__DIR__) . '/remove.class.php';

class sampleOptionTwoRemoveProcessor extends sampleModuleRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';
}

return 'sampleOptionTwoRemoveProcessor';
