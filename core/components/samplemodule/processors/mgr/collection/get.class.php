<?php

require_once dirname(__DIR__) . '/get.class.php';

class sampleCollectionGetProcessor extends sampleModuleGetProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    public function beforeOutput()
    {
        if (!$this->object->get('content')) {
            $this->object->set('content', '');
        }
        return parent::beforeOutput();
    }
}

return 'sampleCollectionGetProcessor';
