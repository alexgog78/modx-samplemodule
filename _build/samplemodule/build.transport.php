<?php

/**
 * @var modX $modx
 */
require_once dirname(__DIR__) . '/modx.php';
require_once __DIR__ . '/build.config.php';

/**
 * @var modPackageBuilder $builder
 */
$builder = $modx->loadClass('transport.modPackageBuilder', '', false, true);
$builder = new modPackageBuilder($modx);

/**
 * @var sampleModule $service
 */
$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH);

/** Creating package */
require_once PKG_BUILD_TRANSPORT_PATH . 'package.inc.php';

/** Files */
require_once PKG_BUILD_TRANSPORT_PATH . 'files.inc.php';

/** modSystemSetting */
require_once PKG_BUILD_TRANSPORT_PATH . 'settings.inc.php';

/** modMenu */
require_once PKG_BUILD_TRANSPORT_PATH . 'menus.inc.php';

/** modMediaSource */
require_once PKG_BUILD_TRANSPORT_PATH . 'sources.inc.php';

/** Resolvers */
require_once PKG_BUILD_TRANSPORT_PATH . 'resolvers.inc.php';

/** Create .zip file */
$builder->pack();
$modx->log(modX::LOG_LEVEL_INFO, 'Package transport  zip created');

exit();
