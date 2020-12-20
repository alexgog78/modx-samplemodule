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
        $c->select($this->modx->getSelectColumns('sampleCollection', 'Collection', 'collection_', ['name', 'is_active',]));
        return $c;
    }
}

return 'sampleItemGetListProcessor';
