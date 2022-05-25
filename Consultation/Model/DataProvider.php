<?php

namespace Perspective\Consultation\Model;

use Perspective\Consultation\Model\ResourceModel\Extension\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;
    // @codingStandardsIgnoreStart
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $extensionCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $extensionCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    // @codingStandardsIgnoreEnd
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $extension) {
            $this->loadedData[$extension->getConsId()] = $extension->getData();
        }
        return $this->loadedData;
    }
}
