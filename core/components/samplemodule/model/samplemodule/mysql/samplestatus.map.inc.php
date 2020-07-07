<?php

$xpdo_meta_map['sampleStatus'] = [
    'package' => 'samplemodule',
    'version' => '1.1',
    'table' => 'statuses',
    'extends' => 'AbstractSimpleObject',
    'tableMeta' => [
        'engine' => 'MyISAM',
    ],
    'fields' => [
        'name' => NULL,
        'menuindex' => 0,
        'is_active' => 0,
    ],
    'fieldMeta' => [
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'menuindex' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'default' => 0,
        ],
        'is_active' => [
            'dbtype' => 'tinyint',
            'precision' => '1',
            'attributes' => 'unsigned',
            'phptype' => 'boolean',
            'null' => false,
            'default' => 0,
        ],
    ],
    'indexes' => [
        'menuindex' => [
            'alias' => 'menuindex',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'menuindex' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'is_active' => [
            'alias' => 'is_active',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'is_active' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'composites' => [
        'Item' => [
            'class' => 'sampleItem',
            'local' => 'id',
            'foreign' => 'status_id',
            'cardinality' => 'many',
            'owner' => 'local',
        ],
    ],
    'validation' => [
        'rules' => [
            'name' => [
                'preventBlank' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOMinLengthValidationRule',
                    'value' => '1',
                    'message' => 'field_required',
                ],
            ],
        ],
    ],
];
