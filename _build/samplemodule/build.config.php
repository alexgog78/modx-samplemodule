<?php

define('PKG_NAME', 'SampleModule');
define('PKG_NAME_LOWER', 'samplemodule');
define('PKG_PATH', MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/');
define('DB_TYPE', $modx->getOption('dbtype'));
define('PKG_MODEL_PATH', PKG_PATH . '/model/');
define('PKG_SCHEMA_PATH', PKG_PATH . '/model/schema/' . PKG_NAME_LOWER . '.' . DB_TYPE . '.schema.xml');
