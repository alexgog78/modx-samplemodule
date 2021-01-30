<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/get.class.php';

class sampleCollectionGetProcessor extends abstractModuleGetProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCollection';

    public function beforeOutput()
    {
        $this->prepareCodeText();
        $this->prepareTagsCombo();
        $this->getCategories();
        parent::beforeOutput();
    }

    private function prepareCodeText()
    {
        if (!$this->object->get('code')) {
            $this->object->set('code', '');
        }
    }

    private function prepareTagsCombo()
    {
        $tags = [];
        foreach ($this->object->get('tags') ?? [] as $value) {
            $tags[] = [
                'value' => $value,
            ];
        }
        $this->object->set('tags_combo', $tags);
    }

    private function getCategories()
    {
        $collection = $this->object->getCategories();
        $categories = [];
        foreach ($collection as $category) {
            $categories[] = $category->toArray();
        }
        $this->object->set('categories', $categories);
    }
}

return 'sampleCollectionGetProcessor';
