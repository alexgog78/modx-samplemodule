<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var sampleModule $service */
            $service = $modx->getService('samplemodule', 'sampleModule', MODX_CORE_PATH . 'components/samplemodule/model/');
            /** @var xPDOManager $manager */
            $manager = $modx->getManager();
            $mapFile = $service->modelPath . $service::PKG_NAMESPACE . '/metadata.mysql.php';
            /**
             * @noinspection PhpIncludeInspection
             * @var $xpdo_meta_map
             */
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
