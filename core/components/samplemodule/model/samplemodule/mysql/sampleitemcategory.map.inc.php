<?php

$xpdo_meta_map['sampleItemCategory'] = [
    'package' => 'samplemodule',
    'version' => '1.1',
    'table' => 'item_categories',
    'extends' => 'AbstractObject',
    'tableMeta' => [
        'engine' => 'MyISAM',
    ],
    'fields' => [
        'item_id' => NULL,
        'category_id' => NULL,
    ],
    'fieldMeta' => [
        'item_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'index' => 'pk',
        ],
        'category_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'index' => 'pk',
        ],
    ],
    'indexes' => [
        'PRIMARY' => [
            'alias' => 'PRIMARY',
            'primary' => true,
            'unique' => true,
            'type' => 'BTREE',
            'columns' => [
                'item_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
                'category_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'aggregates' => [
        'Item' => [
            'class' => 'sampleItem',
            'local' => 'item_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'foreign',
        ],
        'Category' => [
            'class' => 'sampleCategory',
            'local' => 'category_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'foreign',
        ],
    ],
];
