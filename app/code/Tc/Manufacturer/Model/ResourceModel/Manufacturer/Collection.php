<?php
namespace Tc\Manufacturer\Model\ResourceModel\Manufacturer;
use Tc\Manufacturer\Model\ResourceModel\Manufacturer as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'manufacturer_id';
    protected $_eventPrefix = 'tc_manufacturer_manufacturer_collection';
    protected $_eventObject = 'manufacturer_collection';

    protected function _construct()
    {
        $this->_init('Tc\Manufacturer\Model\Manufacturer', 'Tc\Manufacturer\Model\ResourceModel\Manufacturer');
    }
}