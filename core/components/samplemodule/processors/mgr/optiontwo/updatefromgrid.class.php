<?php

require_once __DIR__ . '/update.class.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/helpers/gridupdate.trait.php';

class sampleOptionTwoUpdateFromGridProcessor extends sampleOptionTwoUpdateProcessor
{
    use abstractModuleProcessorHelperGridUpdate;
}

return 'sampleOptionTwoUpdateFromGridProcessor';
