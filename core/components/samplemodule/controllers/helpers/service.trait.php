<?php

trait sampleModuleControllerHelperService
{
    /** @var sampleModule */
    protected $service;

    /**
     * @return object|null
     */
    protected function getService()
    {
        $service = $this->modx->getService($this->namespace, $this->namespace, $this->namespace_path . '/model/');
        return $service;
    }
}
