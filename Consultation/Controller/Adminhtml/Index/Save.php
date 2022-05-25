<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */
namespace Perspective\Consultation\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Perspective\Consultation\Model\Extension;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var Extension
     */
    protected $uiExamplemodel;
    /**
     * @var Session
     */
    protected $adminsession;
    /**
     * @param Action\Context $context
     * @param Extension           $uiExamplemodel
     * @param Session        $adminsession
     */
    public function __construct(
        Action\Context $context,
        Extension $uiExamplemodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->uiExamplemodel = $uiExamplemodel;
        $this->adminsession = $adminsession;
    }
    /**
     * Save blog record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $cons_id = $this->getRequest()->getParam('cons_id');
            if ($cons_id) {
                $this->uiExamplemodel->load($cons_id);
            }
            $this->uiExamplemodel->setData($data)->setStatus(2)->save();

            $emailHelper = $this->_objectManager->create('Perspective\Consultation\Helper\Email');
            $emailHelper->sendEmail(
                $this->uiExamplemodel->getName(),
                $this->uiExamplemodel->getConsId(),
                $this->uiExamplemodel->getEmail(),
                $this->uiExamplemodel->getComment(),
                $this->uiExamplemodel->getAnswer()
            );
            $this->messageManager->addSuccess(__('The response was successfully sent to the customer.'));
        }

        return $resultRedirect->setPath('*/*/');
    }
}
