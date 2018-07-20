<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 11.07.18
 * Time: 14:12
 */

namespace Tc\Manufacturer\Controller\Adminhtml\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Tc\Manufacturer\Model\Manufacturer;

class Index extends Action
{
//    protected $pageFactory;
//    public function __construct(Context $context, PageFactory $pageFactory)
//    {
//        $this->pageFactory = $pageFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        var_dump(__METHOD__);
//        $page_object = $this->pageFactory->create();;
//        return $page_object;
//    }

//    protected $_pageFactory;
//
//    protected $_manufacturerFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory,
//        Manufacturer $manufacturer
//    )
//    {
//        $this->_pageFactory = $pageFactory;
//        $this->_manufaturerFactory = $manufacturer;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        $manufaturer = $this->_manufaturerFactory->create();
//        $collection = $manufaturer->getCollection();
//        foreach($collection as $item){
//            echo "<pre>";
//            print_r($item->getData());
//            echo "</pre>";
//        }
//        exit();
//        return $this->_pageFactory->create();
//    }




///**
// * @var \Tc\Manufacturer\Model\Manufacturer
// */
//    protected $_modelManufaturer;
//
//    /**
//     * @param Context $context
//     * @param Manaufacturer $modelManufacturer
//     */
//
//    public function __construct(Context $context, Manufacturer $modelManufacturer, array $data = [])
//    {
//        parent::__construct($context);
//        $this->_modelManufaturer = $modelManufacturer;
//    }
//
//    public function execute()
//    {
//       $manufacturerModel = $this->_modelManufaturer->create();
//
//       $item = $manufacturerModel->load(1);
//       var_dump($item->getData());
//
//       $manufacturerCollection = $manufacturerModel->getCollection();
//       var_dump($manufacturerCollection->getData());
//    }

    protected $resultPageFactory = false;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);

    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('manufacturer')));

        return $resultPage;
    }




}