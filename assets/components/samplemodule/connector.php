<?php

require_once dirname(__DIR__) . '/abstractmodule/connector.php';

class SampleModuleConnector extends AbstractConnector
{
    /** @var string */
    protected $serviceName = 'samplemodule';
}

(new SampleModuleConnector())->run();
