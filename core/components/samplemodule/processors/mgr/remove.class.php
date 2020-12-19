<?php

abstract class sampleModuleRemoveProcessor extends modObjectRemoveProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];
}
