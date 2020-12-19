<?php

require_once dirname(__DIR__) . '/getlist.class.php';

class sampleItemGetListProcessor extends sampleModuleGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /**
     * @param xPDOQuery $c
     * @return void|xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $collectionId = $this->getProperty('collection_id');
        if ($collectionId) {
            $c->where([
                'collection_id' => $collectionId,
            ]);
        }
        $c->leftJoin('sampleCollection', 'Collection');
        return parent::prepareQueryBeforeCount($c);
    }

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c->select($this->modx->getSelectColumns('sampleCollection', 'Collection', 'collection_', ['name', 'is_active',]));
        return parent::prepareQueryAfterCount($c);
    }
}

return 'sampleItemGetListProcessor';
