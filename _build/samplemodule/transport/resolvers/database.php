<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $service = $modx->getService('samplemodule', 'sampleModule', MODX_CORE_PATH . 'components/samplemodule/model/', []);
            $manager = $modx->getManager();
            $mapFile = $service->modelPath . $service::PKG_NAMESPACE . '/metadata.mysql.php';
            include $mapFile;
            foreach ($xpdo_meta_map as $baseClass => $extends) {
                foreach ($extends as $className) {
                    $manager->createObjectContainer($className);
                }
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
