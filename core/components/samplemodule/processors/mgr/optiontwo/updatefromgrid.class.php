<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class sampleOptionTwoUpdateFromGridProcessor extends sampleOptionTwoUpdateProcessor
{
    use sampleModuleProcessorHelperGridUpdate;
}

return 'sampleOptionTwoUpdateFromGridProcessor';
