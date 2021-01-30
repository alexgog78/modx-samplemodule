<?php

define('PKG_NAME', 'sampleModule');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));

define('PKG_PATH', MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/');
define('DB_TYPE', 'mysql');
define('PKG_MODEL_PATH', PKG_PATH . 'model/');
define('PKG_SCHEMA_PATH', PKG_PATH . 'model/schema/' . PKG_NAME_LOWER . '.' . DB_TYPE . '.schema.xml');

define('PKG_BUILD_PATH', __DIR__ . '/');
define('PKG_BUILD_MODEL_PATH', PKG_BUILD_PATH . 'model/');
define('PKG_BUILD_TRANSPORT_PATH', PKG_BUILD_PATH . 'transport/');
define('PKG_BUILD_TRANSPORT_DATA_PATH', PKG_BUILD_TRANSPORT_PATH . 'data/');
define('PKG_BUILD_TRANSPORT_PROPERTIES_PATH', PKG_BUILD_TRANSPORT_PATH . 'properties/');
define('PKG_BUILD_TRANSPORT_RESOLVERS_PATH', PKG_BUILD_TRANSPORT_PATH . 'resolvers/');
//define('PKG_BUILD_SAMPLEDATA_PATH', PKG_BUILD_PATH . 'sampledata/');
//define('PKG_BUILD_SAMPLEDATA_SOURCES_PATH', PKG_BUILD_SAMPLEDATA_PATH . 'sources/');
