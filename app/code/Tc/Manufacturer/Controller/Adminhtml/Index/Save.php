<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 15:56
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;

use TC\Manufacturer\Model\Manufacturer;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Backend\App\Action;
class Save extends Action
{
    protected $dataPersistor;
    public function __construct(Context $context, DataPersistorInterface $dataPersistor)
    {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            if (empty($data['id'])) {
                $data['id'] = null;
            }
            $manufacturer = $this->_objectManager->create(Manufacturer::class)->load($id);
            $data = $this->_filterImageData($data);
            $manufacturer->setData($data);
            try {
                $manufacturer->save();
                $this->messageManager->addSuccess(__('Manufacturer %1 has been saved!', $data['name']));
                $this->dataPersistor->clear('manufacturer');
                return $resultRedirect->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addError(__('Error has occurred while saving Manufacturer!'));
            }
            $this->dataPersistor->set('manufacturer', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
    public function _filterImageData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['logo_url'][0]['name'])) {
            $data['logo_url'] = $data['logo_url'][0]['name'];
        } else {
            $data['logo_url'] = null;
        }
        return $data;
    }
    public function _isAllowed(): string
    {
        return $this->_authorization->isAllowed('TC_Manufacturer::manufacturer');
    }
}