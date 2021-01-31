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
            $service = $modx->getService('samplemodule', 'sampleModule', MODX_CORE_PATH . 'components/samplemodule/model/', []);
            /**
             * @noinspection PhpIncludeInspection
             * @var sampleModuleData $sampleModuleData
             */
            require_once $service->sampleDataPath . 'sampledata.class.php';
            $sampleModuleData = new sampleModuleData($service);
            $sampleModuleData->process();
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
