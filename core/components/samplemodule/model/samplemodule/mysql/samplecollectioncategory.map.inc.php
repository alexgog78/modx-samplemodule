<?php

$xpdo_meta_map['sampleCollectionCategory'] = [
    'package' => 'samplemodule',
    'version' => '1.1',
    'table' => 'collection_categories',
    'extends' => 'xPDOObject',
    'tableMeta' => [
        'engine' => 'InnoDB',
    ],
    'fields' => [
        'collection_id' => NULL,
        'category_id' => NULL,
    ],
    'fieldMeta' => [
        'collection_id' => [
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
                'collection_id' => [
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
        'Collection' => [
            'class' => 'sampleCollection',
            'local' => 'collection_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'foreign',
            'criteria' => [
                'foreign' => [
                    'is_active' => 1,
                ],
            ],
        ],
        'Category' => [
            'class' => 'sampleCategory',
            'local' => 'category_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'foreign',
            'criteria' => [
                'foreign' => [
                    'is_active' => 1,
                ],
            ],
        ],
    ],
];
