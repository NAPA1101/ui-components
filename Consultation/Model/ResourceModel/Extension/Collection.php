<?php
namespace Perspective\Consultation\Model\ResourceModel\Extension;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Perspective\Consultation\Model\Extension as ExtensionModel;
use Perspective\Consultation\Model\ResourceModel\Extension as ExtensionResourceModel;


class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init( ExtensionModel::class, ExtensionResourceModel::class);
    }
}
