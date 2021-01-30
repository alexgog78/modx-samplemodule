<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/getlist.class.php';

class sampleCategoryGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCategory';

    /**
     * @param array $list
     * @return array
     */
    public function beforeIteration(array $list) {
        $isFilter = $this->getProperty('filter') ? true : false;
        if ($isFilter) {
            $list[] = [
                'id' => 0,
                'name' => '(' . $this->modx->lexicon($this->objectType . '_all') . ')',
            ];
        }
        return parent::beforeIteration($list);
    }
}

return 'sampleCategoryGetListProcessor';
