<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 02.08.18
 * Time: 15:13
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use TC\Manufacturer\Model\ImageUploader;
use Magento\Backend\App\Action;
class Upload extends Action
{
    public $imageUploader;

    public function __construct(Context $context, ImageUploader $imageUploader)
    {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    public function execute()
    {
        try {
            $result = $this->imageUploader->saveFileToTmpDir('logo_url');
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('TC_Manufacturer::manufacturer');
    }
}