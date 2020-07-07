<?php

require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'components/abstractmodule/cli/abstractbuildmodel.class.php';

class BuildModel extends AbstractBuildModel
{
    /** @var string */
    protected $schemaPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/schema/' . PKG_NAME_LOWER . '.mysql.schema.xml';

    /** @var string */
    protected $modelPath = MODX_CORE_PATH . 'components/' . PKG_NAME_LOWER . '/model/';
}

array_shift($argv);
$build = new BuildModel($modx, $argv);
$build->run();
exit();
