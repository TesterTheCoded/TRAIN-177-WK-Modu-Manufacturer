<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 03.08.18
 * Time: 13:13
 */

namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;
use Tc\Manufacturer\Block\Adminhtml\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
class BackButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s'", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}