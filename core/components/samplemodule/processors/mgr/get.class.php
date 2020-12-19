<?php

abstract class sampleModuleGetProcessor extends modObjectGetProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];
}
