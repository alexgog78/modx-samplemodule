<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class sampleItemUpdateFromGridProcessor extends sampleItemUpdateProcessor
{
    use sampleModuleProcessorHelperGridUpdate;
}

return 'sampleItemUpdateFromGridProcessor';
