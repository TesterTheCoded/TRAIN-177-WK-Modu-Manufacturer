<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 16:23
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

class MassDelete extends Action
{
    protected $manufacturerFactory;

    public function execute()
    {
        // Get IDs of the selected news
        $manufacturerIds = $this->getRequest()->getParam('news');

        foreach ($manufacturerIds as $manufacturerId) {
            try {
                /** @var $newsModel \Tc\Manufacturer\Model\Index */
                $manufacturerModel = $this->_manufacturerFactory->create();
                $manufacturerModel->load($manufacturerId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        if (count($manufacturerIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($manufacturerIds))
            );
        }

        $this->_redirect('* /*/index');
    }
}