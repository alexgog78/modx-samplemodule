<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleModuleMgrCollectionUpdateManagerController extends sampleModuleMgrUpdateController
{
    /** @var bool */
    protected $loadRichText = true;

    /** @var string */
    protected $pageTitle = 'collection_updating';

    /** @var array */
    protected $languageTopics = [
        'samplemodule:collection',
    ];

    /** @var string */
    protected $objectGetProcessorPath = 'mgr/collection/get';

    //protected $objectPrimaryKey = 'id';

    /** @var string */
    //protected $objectClassKey = 'sampleCollection';

    /** @return string */
    /*public function getPageTitle()
    {
        return $this->getLexiconTopic('editing', [
                'record' => $this->getLexiconTopic('collection'),
            ]) . ' | ' . $this->modx->lexicon($this->namespace);
    }*/

    /**
     * @param array $scriptProperties
     * @return mixed
     */
    /*public function process(array $scriptProperties = [])
    {
        parent::process($scriptProperties);
        $this->prepareJsonCombo();
    }*/

    public function loadCustomCssJs()
    {
        parent::loadCustomCssJs();
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/formpanel.collection.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/collection/grid.property.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/window.item.js');
        $this->addJavascript($this->service->jsUrl . 'mgr/widgets/item/grid.property.js');
        $this->addLastJavascript($this->service->jsUrl . 'mgr/sections/collection/update.js');

        $configJs = $this->modx->toJSON([
            'xtype' => 'samplemodule-page-collection-update',
            'record' => $this->object,
        ]);
        $this->addHtml('<script type="text/javascript">Ext.onReady(function () {MODx.load(' . $configJs . ');});</script>');
    }

    /*private function prepareJsonCombo()
    {
        $jsonFields = $this->object->jsonFields;
        foreach ($jsonFields as $field) {
            $combo = [];
            foreach ($this->object->get($field) ?? [] as $value) {
                if ($value === '' || is_array($value)) {
                    continue;
                }
                $combo[] = [
                    'value' => $value,
                ];
            }
            if ($combo) {
                $this->object->set($field . '_combo', $combo);
            }
        }
    }*/
}
