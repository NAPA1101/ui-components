<?php

namespace Perspective\Consultation\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Reply extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Reply'));

        $id = $this->getRequest()->getParam('cons_id');
        if ($id) {
            $ext = $this->_objectManager->create('Perspective\Consultation\Model\Extension');
            $ext->load($id)->setStatus(1)->save();
        }
        return $resultPage;
    }
}
