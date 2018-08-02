<?php
///**
// * Created by PhpStorm.
// * User: weronikakrzynowek
// * Date: 19.07.18
// * Time: 12:39
// */
//
//namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit;
//
//
//use Magento\Backend\Block\Widget\Form\Generic;
//
//class Form extends Generic
//{
//    /**
//     * @return $this
//     */
//    protected function _prepareForm()
//    {
//        /** @var \Magento\Framework\Data\Form $form */
//        $form = $this->_formFactory->create(
//            [
//                'data' => [
//                    'id' => 'edit_form',
//                    'action' => $this->getData('action'),
//                    'method' => 'post'
//                ]
//            ]
//        );
//        $form->setUseContainer(true);
//        $this->setForm($form);
//
//        return parent::_prepareForm();
//    }
//
//}