<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $data = [
                'name' => 'SampleModule',
                'description' => 'Default media source for images of SampleModule module',
                'class_key' => 'sources.modFileMediaSource',
                'properties' => [
                    'basePath' => [
                        'name' => 'basePath',
                        'desc' => 'prop_file.basePath_desc',
                        'type' => 'textfield',
                        'lexicon' => 'core:source',
                        'value' => 'assets/media/samplemodule/',
                    ],
                    'baseUrl' => [
                        'name' => 'baseUrl',
                        'desc' => 'prop_file.basePath_desc',
                        'type' => 'textfield',
                        'lexicon' => 'core:source',
                        'value' => 'assets/media/samplemodule/',
                    ],
                ],
            ];

            $source = $modx->getObject('sources.modMediaSource', [
                'name' => $data['name'],
            ]);
            if (!$source) {
                $source = $modx->newObject('sources.modMediaSource', $data);
            }
            //TODO update properties

            $source->save();


            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
