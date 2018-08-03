<?php
namespace Tc\Manufacturer\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
class Edit extends Action
{
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend($params['id'] ? $params['id'] : __('Add Manufacturer'));
        return $resultPage;
    }
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('TC_Manufacturer::manufacturer');
    }
}
