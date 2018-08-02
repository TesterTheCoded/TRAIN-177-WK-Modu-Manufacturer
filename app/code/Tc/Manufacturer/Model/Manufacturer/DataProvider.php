<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 23.07.18
 * Time: 12:17
 */

namespace Tc\Manufacturer\Model\Manufacturer;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Tc\Manufacturer\Controller\Adminhtml\Manufacturer;
use Tc\Manufacturer\Model\ResourceModel\Manufacturer\CollectionFactory;


class DataProvider extends AbstractDataProvider
{
    public function __construct($name,
                                $primaryFieldName,
                                $requestFieldName,
                                CollectionFactory $collectionFactory,
                                array $meta = [],
                                array $data = [])
    { $this->collection = $collectionFactory->create();
    parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
}


public function getData()
{
    if (isset($this->loadedData)) {
        return $this->loadedData;
    }

    $items = $this->collection->getItems();
    $this->loadedData = array();
    /** @var Manufacturer $manufacturer */
    foreach ($items as $manufacturer) {
        // notre fieldset s'apelle "contact" d'ou ce tableau pour que magento puisse retrouver ses datas :
        $this->loadedData[$manufacturer->getId()]['manufacturer'] = $manufacturer->getData();
    }


    return $this->loadedData;

}
}