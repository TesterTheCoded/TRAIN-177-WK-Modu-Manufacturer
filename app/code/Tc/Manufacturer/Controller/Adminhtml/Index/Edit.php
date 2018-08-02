<?php
namespace Tc\Manufacturer\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Tc\Manufacturer\Model\ResourceModel\Manufacturer\CollectionFactory;

class Edit extends Action
{
    protected $resultPageFactory = false;
    protected $manufacturerFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory,   CollectionFactory $collectionFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;

    }
//
//
//    public function execute()
//    {
//        $params = $this->getRequest()->getParams();
//        $resultPage = $this->resultPageFactory->create(ResultFactory::TYPE_PAGE);
//
//        $pageTitle = __('Add Manufacturer');
//
//        if (true === isset($params['id'])) {
//            $model = $this->_objectManager->create(Manufacturer::class)->load($params['id']);
//
//            if (null !== $model->getId()) {
//                $pageTitle = $model->getData('name');
//            }
//        }
//
//        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
//
//        return $resultPage;
//    }
//
//    public function _isAllowed()
//    {
//        return $this->_authorization->isAllowed('Tc_Manufacturer::manufacturer');
//    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }

//
//
//    public function execute()
//    {
//        $manufacturerId = $this->getRequest()->getParam('id');
//        /** @var \Tc\Manufacturer\Model\Manufacturer $model */
//        $model = $this->manufacturerFactory->create();
//
//        if ($manufacturerId) {
//            $model->load($manufacturerId);
//            if (!$model->getId()) {
//                $this->messageManager->addError(__('This news no longer exists.'));
//                $this->_redirect('*/*/');
//                return;
//            }
//        }
//
//        // Restore previously entered form data from session
//        $data = $this->_session->getNewsData(true);
//        if (!empty($data)) {
//            $model->setData($data);
//        }
//        $this->coreRegistry->register('manufacturer_manufacturer', $model);
//
//        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
//        $resultPage = $this->_resultPageFactory->create();
//        $resultPage->setActiveMenu('Tc_Manufacturer::main_menu');
//        $resultPage->getConfig()->getTitle()->prepend(__('Manufacturer'));
//
//        return $resultPage;
//    }
}

