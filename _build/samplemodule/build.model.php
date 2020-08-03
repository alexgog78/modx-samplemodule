<?php

require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'components/abstractmodule/cli/buildmodel.class.php';

class BuildModel extends AbstractBuildModelCli
{
}

(new BuildModel())->run();
