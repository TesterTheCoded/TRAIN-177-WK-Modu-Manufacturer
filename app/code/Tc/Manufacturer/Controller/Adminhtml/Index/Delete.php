<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 16:20
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;

use Tc\Manufacturer\Model\Manufacturer;
use Magento\Backend\App\Action;

class Delete extends Action
{
    public function __construct(Action\Context $context, Manufacturer $model)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');

        if (null !== $id) {
            try {
                $model = $this->_objectManager->create(Manufacturer::class)->load($id);

                if (null !== $model->getId()) {
                    $model->delete();
                    $this->messageManager->addSuccessMessage(__('Manufacturer deleted'));
                } else {
                    $this->messageManager->addErrorMessage(__('Manufacturer does not exist'));
                }

            } catch (Exception $e) {
                $this->messageManager->addErrorMessage(__('Error while trying to delete Manufacturer: %s', $e->getMessage()));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Manufacturer does not exist'));
        }

        return $resultRedirect->setPath('*/*/');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tc_Manufacturer::manufacturer');
    }
}