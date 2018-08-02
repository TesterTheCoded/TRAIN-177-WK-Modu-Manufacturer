<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 11.07.18
 * Time: 14:12
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Tc\Manufacturer\Model\Manufacturer;
class Index extends Action
{
    protected $resultPageFactory = false;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('manufacturer')));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tc_Manufacturer::manufacturer');
    }
}