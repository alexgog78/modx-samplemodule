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
            $source = $modx->getObject('sources.modMediaSource', [
                'name' => 'SampleModule',
            ]);
            $setting = $modx->getObject('modSystemSetting', [
                'key' => 'samplemodule_file_source',
            ]);
            $setting->set('value', $source->id);
            $setting->save();
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
