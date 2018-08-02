<?php
///**
// * Created by PhpStorm.
// * User: weronikakrzynowek
// * Date: 19.07.18
// * Time: 12:52
// */
//
//namespace Tc\Manufacturer\Block\Adminhtml\Manufacturer\Edit\Tab;
//
//use Magento\Framework\Registry;
//use Magento\Framework\Data\FormFactory;
//use Magento\Cms\Model\Wysiwyg\Config;
//use Magento\Backend\Block\Template\Context;
//use Magento\Backend\Block\Widget\Tab\TabInterface;
//use Magento\Backend\Block\Widget\Form\Generic;
//use Tc\Manufacturer\Model\System\Config\Status;
//use Form
//class Info extends Generic implements TabInterface
//{
//    /**
//     * @var \Magento\Cms\Model\Wysiwyg\Config
//     */
//    protected $_wysiwygConfig;
//
//    /**
//     * @var \Tc\Manufacturer\Model\System\Config\Status
//     */
//    protected $_manufacturerStatus;
//
//    /**
//     * @param Context $contxt
//     * @param Registry $registry
//     * @param FormFactory $formFactory
//     * @param Config $wysiwygConfig
//     * @param Status $manufacturerStatus
//     * @param array $data
//     */
//    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, array $data = [],
//    Config $wysiwygConfig, Status $manufacturerStatus)
//    {
//        $this->_wysiwygConfig = $wysiwygConfig;
//        $this->_manufacturerStatus = $manufacturerStatus;
//        parent::__construct($context, $registry, $formFactory, $data);
//    }
//
//    /**
//     * Prepare form fields
//     * @return \Magento\Backend\Block\Widget\Form
//     */
//    protected function _prepareForm()
//    {
//      /** @var $model \Tc\Manufacturer\Model\Manufacturer */
//      $model = $this->_coreRegistry->registry('manufacturer_manufacturer');
//
//      /** @var \Magento\Framework\Data\Form $form */
//      $form = $this->_formFactory->create();
//      $form->setHtmlIdPrefix('manufacturer_');
//      $form->setFieldNameSuffix('manufacturer');
//
//      $fieldset = $form->addFieldset(
//          'base_fieldset',
//          ['legend' => __('General')]
//      );
//
//      if ($model->getId()) {
//          $fieldset->addField(
//              'id', 'hidden', ['name' => 'id']
//          );
//      }
//      $fieldset->addField(
//          'name', 'text',
//          [
//              'name' => 'name',
//              'label' => __('Name'),
//              'options' => $this->_manufacturerStatus->toOptionArray()
//          ]
//      );
//        $fieldset->addField(
//            'description', 'text',
//            [
//                'name' => 'description',
//                'label' => __('Description'),
//                'required' => true,
//                'config' => $wysiwygConfig
//                ]
//        );
//      $data = $model->getData();
//      $form->setValues($data);
//      $this->setForm($form);
//
//      return parent::_prepareForm();
//    }
//
//    /**
//     * Prepare label for tab
//     * @return string
//     */
//    public function getTabLabel()
//    {
//      return __('Manufacturer info');
//    }
//    /**
//     * Prepare title for tab
//     *
//     * @return string
//     */
//    public function getTabTitle()
//    {
//        return __('News Info');
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function canShowTab()
//    {
//        return true;
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function isHidden()
//    {
//        return false;
//    }
//}