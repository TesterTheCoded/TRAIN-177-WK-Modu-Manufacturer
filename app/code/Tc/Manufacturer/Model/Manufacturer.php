<?php
namespace Tc\Manufacturer\Model;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Tc\Manufacturer\Model\ResourceModel\Manufacturer as ResourceModel;
class Manufacturer extends AbstractModel  implements IdentityInterface //extends dataObject
{

//    const CACHE_TAG = "manufacturer_manufacturer";
//    protected $_cacheTag = "manufacturer_manufacturer";
//    protected $_eventPrefix = "manufacturer_manufacturer";

//    protected function _construct()
//    {
//        $this->_init(ResourceModel::class);
//    }

//    public function getIdentities()
//    {
//        return [self::CACHE_TAG . '_' . $this->getId()];
//    }

//    const CACHE_TAG = 'tc_manufacturer_manufacturer';
//
//    protected $_cacheTag = 'tc_manufacturer_manufacturer';
//
//    protected $_eventPrefix = 'tc_manufacturer_manufacturer';
//
//    protected function _construct()
//    {
//        $this->_init('Tc\Manufacturer\Model\ResourceModel\Manufacturer');
//    }
//
//    public function getIdentities()
//    {
//        return [self::CACHE_TAG . '_' . $this->getId()];
//    }
//
//    public function getDefaultValues()
//    {
//        $values = [];
//
//        return $values;
//    }

//
//    /**
//     * @var \Magento\Framework\Stdlib\DateTime
//     */
//    protected $_dateTime;
//
//    /**
//     * @return void
//     */
//    protected function _construct()
//    {
//        $this->_init(\Tc\Manufacturer\Model\ResourceModel\Mnufacturer::class);
//    }

    const CACHE_TAG = 'tc_manufacturer_manufacturer';
    protected $_cacheTag = 'tc_manufacturer_manufacturer';
    protected $_eventPrefix = 'tc_manufacturer_manufacturer';
    protected function _construct()
    {
        $this->_init('Tc\Manufacturer\Model\ResourceModel\Manufacturer');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

}