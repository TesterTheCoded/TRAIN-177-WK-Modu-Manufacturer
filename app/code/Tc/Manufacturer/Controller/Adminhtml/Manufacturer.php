<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 19.07.18
 * Time: 16:58
 */

namespace Tc\Manufacturer\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Tc\Manufacturer\Model\ManufacturerFactory;
class Manufacturer extends Action
{

    protected $_coreRegistry;

    protected $_resultPageFactory;

    protected $_manufacturerFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param ManufacturerFactory $newsFactory
     */
    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        ManufacturerFactory $manufacturerFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_manufacturerFactory = $manufacturerFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tc_Manufacturer::manufacturer');
    }

public function execute()
    {
        // TODO: Implement execute() method.
    }
}