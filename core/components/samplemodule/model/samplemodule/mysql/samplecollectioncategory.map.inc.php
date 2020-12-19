<?php
$xpdo_meta_map['sampleCollectionCategory']= array (
  'package' => 'samplemodule',
  'version' => '1.1',
  'table' => 'collection_categories',
  'extends' => 'xPDOObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'collection_id' => NULL,
    'category_id' => NULL,
  ),
  'fieldMeta' => 
  array (
    'collection_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
    'category_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'attributes' => 'unsigned',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 
    array (
      'alias' => 'PRIMARY',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'collection_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
        'category_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'Collection' => 
    array (
      'class' => 'sampleCollection',
      'local' => 'collection_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
      'criteria' => 
      array (
        'foreign' => 
        array (
          'is_active' => 1,
        ),
      ),
    ),
    'Category' => 
    array (
      'class' => 'sampleCategory',
      'local' => 'category_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
      'criteria' => 
      array (
        'foreign' => 
        array (
          'is_active' => 1,
        ),
      ),
    ),
  ),
);
