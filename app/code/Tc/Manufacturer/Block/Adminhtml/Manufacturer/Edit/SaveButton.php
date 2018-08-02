<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 23.07.18
 * Time: 13:16
 */

namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Tc\Manufacturer\Block\Adminhtml\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Contact'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}