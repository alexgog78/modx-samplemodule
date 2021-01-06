<?php

$xpdo_meta_map['sampleCollection'] = [
    'package' => 'samplemodule',
    'version' => '1.1',
    'table' => 'collections',
    'extends' => 'abstractSimpleObject',
    'tableMeta' => [
        'engine' => 'InnoDB',
    ],
    'fields' => [
        'name' => NULL,
        'description' => NULL,
        'richtext' => NULL,
        'code' => NULL,
        'option_one_id' => NULL,
        'option_two_id' => 0,
        'tags' => NULL,
        'menuindex' => 0,
        'is_active' => 0,
        'created_on' => NULL,
        'created_by' => 0,
        'updated_on' => NULL,
        'updated_by' => 0,
        'properties' => NULL,
    ],
    'fieldMeta' => [
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'description' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'richtext' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'code' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'option_one_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
        ],
        'option_two_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => true,
            'default' => 0,
        ],
        'tags' => [
            'dbtype' => 'text',
            'phptype' => 'json',
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
        'created_on' => [
            'dbtype' => 'datetime',
            'phptype' => 'datetime',
            'null' => true,
        ],
        'created_by' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'default' => 0,
        ],
        'updated_on' => [
            'dbtype' => 'datetime',
            'phptype' => 'datetime',
            'null' => true,
        ],
        'updated_by' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'default' => 0,
        ],
        'properties' => [
            'dbtype' => 'text',
            'phptype' => 'json',
            'null' => true,
        ],
    ],
    'indexes' => [
        'option_one_id' => [
            'alias' => 'option_one_id',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'option_one_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'option_two_id' => [
            'alias' => 'option_two_id',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'option_two_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
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
        'Items' => [
            'class' => 'sampleItem',
            'local' => 'id',
            'foreign' => 'collection_id',
            'cardinality' => 'many',
            'owner' => 'local',
        ],
        'CategoryIds' => [
            'class' => 'sampleCollectionCategory',
            'local' => 'id',
            'foreign' => 'collection_id',
            'cardinality' => 'many',
            'owner' => 'local',
        ],
    ],
    'aggregates' => [
        'optionOne' => [
            'class' => 'sampleOptionOne',
            'local' => 'option_one_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
            'criteria' => [
                'foreign' => [
                    'is_active' => 1,
                ],
            ],
        ],
        'optionTwo' => [
            'class' => 'sampleOptionTwo',
            'local' => 'option_two_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
            'criteria' => [
                'foreign' => [
                    'is_active' => 1,
                ],
            ],
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
            'option_one_id' => [
                'checkOptionOne' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOForeignKeyConstraint',
                    'foreign' => 'id',
                    'local' => 'option_one_id',
                    'alias' => 'optionOne',
                    'class' => 'sampleOptionOne',
                    'message' => 'no_records_found',
                ],
            ],
        ],
    ],
];
