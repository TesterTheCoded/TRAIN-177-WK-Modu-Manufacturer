<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 06.08.18
 * Time: 15:16
 */

namespace Tc\Manufacturer\Model\Attribute\Source;

//
//class Manufacturer extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
//{
//    /**
//     * Get all options
//     * @return array
//     */
//
//    public function getAllOptions()
//    {
//        if (!$this->_options) {
//            $this->_options = [
//                ['label' => __('Cotton'), 'value' => 'cotton'],
//                ['label' => __('Leather'), 'value' => 'leather'],
//                ['label' => __('Silk'), 'value' => 'silk'],
//                ['label' => __('Denim'), 'value' => 'denim'],
//                ['label' => __('Fur'), 'value' => 'fur'],
//                ['label' => __('Wool'), 'value' => 'wool'],
//            ];
//        }
//        return $this->_options;
//    }
//}

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\Data\OptionSourceInterface;
use Tc\Manufacturer\Model\ResourceModel\Manufacturer\CollectionFactory;
class Manufacturer extends AbstractSource implements OptionSourceInterface
{
    protected $options;
    public function __construct(CollectionFactory $manufacturerCollectionFactory)
    {
        $this->collection = $manufacturerCollectionFactory->create();
    }
    public function getAllOptions()
    {
        if (null !== $this->options) {
            return $this->options;
        }
        $manufacturers = $this->collection->getItems();
        $options = [];
        foreach ($manufacturers as $manufacturer) {
            $options[] = [
                'label' => $manufacturer->getName(),
                'value' => $manufacturer->getId(),
            ];
        }
        $this->options = $this->addEmptyOption($options);
        return $this->options;
    }
    private function addEmptyOption(array $options)
    {
        array_unshift($options, ['label' => $this->getAttribute()->getIsRequired() ? '' : ' ', 'value' => '']);
        return $options;
    }
}