<?php

require_once dirname(__DIR__) . '/get.class.php';

class sampleCollectionGetProcessor extends sampleModuleGetProcessor
{
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
