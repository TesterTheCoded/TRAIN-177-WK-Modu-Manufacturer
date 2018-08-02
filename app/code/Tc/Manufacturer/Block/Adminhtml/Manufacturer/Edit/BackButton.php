<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 27.07.18
 * Time: 11:50
 */

namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Tc\Manufacturer\Block\Adminhtml\Edit\GenericButton;

class BackButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}