<?php

return [
    [
        'text' => 'samplemodule',
        'description' => 'samplemodule_desc',
        'action' => 'mgr/default',
    ],
    [
        'text' => 'samplemodule_collections',
        'description' => 'samplemodule_collections_desc',
        'parent' => 'samplemodule',
        'menuindex' => 0,
        'action' => 'mgr/collection',
    ],
    [
        'text' => 'samplemodule_items',
        'description' => 'samplemodule_items_desc',
        'parent' => 'samplemodule',
        'menuindex' => 1,
        'action' => 'mgr/item',
    ],
    [
        'text' => 'samplemodule_settings',
        'description' => 'samplemodule_settings_desc',
        'parent' => 'samplemodule',
        'menuindex' => 1,
        'action' => 'mgr/settings',
    ],
];
