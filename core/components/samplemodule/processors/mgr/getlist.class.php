<?php

require_once dirname(__DIR__) . '/helpers/searchquery.trait.php';
require_once dirname(__DIR__) . '/helpers/comboquery.trait.php';

abstract class sampleModuleGetListProcessor extends modObjectGetListProcessor
{
    use sampleModuleProcessorHelperSearchQuery;
    use sampleModuleProcessorHelperComboQuery;

    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $defaultSortField = 'menuindex';

    /** @var string */
    public $defaultSortDirection = 'ASC';

    /** @var array */
    protected $searchableFields = [
        'name',
    ];

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        if ($this->isComboQuery()) {
            $this->comboQuery($c);
        }
        $this->searchQuery($c);
        return parent::prepareQueryBeforeCount($c);
    }

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns($this->classKey, $this->classKey));
        return $c;
    }
}
