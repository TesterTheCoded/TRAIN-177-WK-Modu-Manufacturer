<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 23.07.18
 * Time: 13:11
 */

namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Tc\Manufacturer\Block\Adminhtml\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete Manufacturer'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this contact ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['tc_manufacturer_id' => $this->getId()]);
    }
}