<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 15:17
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Tc\Manufacturer\Model\Manufacturer;

class NewAction extends Action
{
    /**
     * Edit A Contact Page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
//    public function execute()
//    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
//
//        $manufacturerDatas = $this->getRequest()->getParam('manufacturer');
//        if(is_array($manufacturerDatas)) {
//            $manufacturer = $this->_objectManager->create(Manufacturer::class);
//            $manufacturer->setData($manufacturerDatas)->save();
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/new');
//        }
//    }
    /**
     * @var \Magento\Backend\Model\View\Result\Forward
     */
//    protected $resultForwardFactory;
//
//    /**
//     * @param \Magento\Backend\App\Action\Context $context
//     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
//     */
//    public function __construct(
//        \Magento\Backend\App\Action\Context $context,
//        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
//    ) {
//        $this->resultForwardFactory = $resultForwardFactory;
//        parent::__construct($context);
//    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tc_Manufacturer::manufacturer');
    }

    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
//        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
//        $resultForward = $this->resultForwardFactory->create();
//        return $resultForward->forward('edit');

        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('manufacturer');
        if (is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Manufacturer::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');

        }

    }}
