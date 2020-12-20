<?php

require_once dirname(__DIR__) . '/getlist.class.php';

class sampleCollectionGetListProcessor extends sampleModuleGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryAfterCount($c);
        $c->select([
            'items_count' => '(SELECT COUNT(*) FROM ' . $this->modx->getTableName('sampleItem') . ' WHERE collection_id = ' . $this->classKey . '.' . $this->primaryKeyField . ')',
        ]);
        return $c;
    }

}

return 'sampleCollectionGetListProcessor';
