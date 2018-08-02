<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 15:56
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

class Save extends Action
{
    protected $manufacturerFactory;
    public function execute()
    {
        $isPost = $this->getRequest()->getPost();

        if ($isPost) {
            $manufacturerModel = $this->_manufacturerFactory->create();
            $manufacturerId = $this->getRequest()->getParam('id');

            if ($manufacturerId) {
                $manufacturerModel->load($manufacturerId);
            }
            $formData = $this->getRequest()->getParam('news');
            $manufacturerModel->setData($formData);

            try {
                // Save news
                $manufacturerModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $manufacturerModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $manufacturerId]);
        }
    }
}