<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/getlist.class.php';

class sampleItemGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleItem';

    /**
     * @param xPDOQuery $c
     * @return void|xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryBeforeCount($c);
        $collectionId = $this->getProperty('collection_id');
        if ($collectionId) {
            $c->where([
                'collection_id' => $collectionId,
            ]);
        }
        $c->leftJoin('sampleCollection', 'Collection');
        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns('sampleCollection', 'Collection', 'collection_', [
            'name',
            'is_active',
        ]));
        $c->sortby('collection_id', 'ASC');
        $c->sortby('sort_order', 'ASC');
        return $c;
    }
}

return 'sampleItemGetListProcessor';
