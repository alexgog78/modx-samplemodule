<?php

$prefix = 'samplemodule';

$_lang[$prefix] = 'SampleModule';
$_lang[$prefix . '_desc'] = 'Пример компонента для MODX';

$files = scandir(__DIR__);
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once $file;
    }
}
