<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 23.07.18
 * Time: 13:14
 */

namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}