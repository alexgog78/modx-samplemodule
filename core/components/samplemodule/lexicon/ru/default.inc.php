<?php

$prefix = 'samplemodule';

$_lang[$prefix] = 'SampleModule';
$_lang[$prefix . '_desc'] = 'Пример компонента для MODX';

$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once $file;
    }
}
