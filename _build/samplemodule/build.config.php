<?php

define('PKG_NAME', 'SampleModule');
define('PKG_NAME_LOWER', 'samplemodule');
define('PKG_VERSION', '1.0.0');
define('PKG_RELEASE', 'beta');

define('MODX_CORE_PATH', dirname(dirname(dirname(__FILE__))) . '/core/');
define('MODX_API_MODE', true);

require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');
