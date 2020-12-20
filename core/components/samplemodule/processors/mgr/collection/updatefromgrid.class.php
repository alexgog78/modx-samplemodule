<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class sampleCollectionUpdateFromGridProcessor extends sampleCollectionUpdateProcessor
{
    use sampleModuleProcessorHelperGridUpdate;
}

return 'sampleCollectionUpdateFromGridProcessor';
