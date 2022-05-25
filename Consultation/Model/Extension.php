<?php
namespace Perspective\Consultation\Model;
use Magento\Framework\Model\AbstractModel;
use Perspective\Consultation\Model\ResourceModel\Extension as ExtensionResourceModel;
class Extension extends AbstractModel
{

    protected function _construct()
    {
        $this->_init(ExtensionResourceModel::class);
    }
}
