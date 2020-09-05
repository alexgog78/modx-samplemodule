<?php

$this->loadClass('AbstractObjectGetProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true);

class sampleCollectionGetProcessor extends AbstractObjectGetProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var string */
    public $objectType = 'samplemodule';

    public function beforeOutput() {
        if ($this->object->get('option_two_id') == 0) {
            $this->object->set('option_two_id', null);
        }
        $this->getCategories();
        return parent::beforeOutput();
    }

    private function getCategories()
    {
        $categories = $this->object->getCategories();
        $this->object->set('categoryids', $categories);
    }
}

return 'sampleCollectionGetProcessor';
