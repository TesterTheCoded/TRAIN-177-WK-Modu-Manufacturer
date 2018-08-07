<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 16.07.18
 * Time: 12:03
 */

namespace Tc\Manufacturer\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;
    private $attributeSetFactory;
    private $attributeSet;
private $categorySetupFactory;

    /**
     * Init
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig, AttributeSetFactory $attributeSetFactory, CategorySetupFactory $categorySetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig       = $eavConfig;
$this->attributeSetFactory = $attributeSetFactory;
$this->categorySetupFactory = $categorySetupFactory;
    }

    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $tableName = $setup->getTable('manufacturer');
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                // Declare data
                $data = [
                    [
                        'name' => 'Wool',
                        'logo_url' => 'The summary',
                        'description' => 'The description',
                        'created_date' => date('Y-m-d H:i:s'),
                        'updated_date' => date('Y-m-d H:i:s'),
                    ],
                    [
                        'name' => 'Fur',
                        'logo_url' => 'The summary',
                        'description' => 'The description',
                        'created_date' => date('Y-m-d H:i:s'),
                        'updated_date' => date('Y-m-d H:i:s'),
                    ]
                ];

                // Insert data to table
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }

        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
            $attributeSet = $this->attributeSetFactory->create();
            $entityTypeId = $categorySetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
            $attributeSetId = $categorySetup->getDefaultAttributeSetId($entityTypeId);
            $data = [
            'attribute_set_name' => 'MyCustomAttribute',
'entity_type_id' => $entityTypeId,
'sort_order' => 200,
];
$attributeSet->setData($data);
$attributeSet->validate();
$attributeSet->save();
$attributeSet->initFromSkeleton($attributeSetId);
$attributeSet->save();




            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'manufacturer',
                [
                    'group' => 'General',
                    'type' => 'int',
                    'label' => 'Manufacturer',
                    'input' => 'select',
                    'source' => 'Tc\Manufacturer\Model\Attribute\Source\Manufacturer',
                    'backend' => 'Tc\Manufacturer\Model\Attribute\Backend\Manufacturer',
                    'required' => true,
                    'sort_order' => 50,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'is_used_in_grid' => false,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => false,
                    'visible' => true,
                    'is_html_allowed_on_front' => true,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true
                ]
            );
            $attribute = $eavSetup->getEavConfig()->getAttribute(Product::ENTITY, 'manufacturer');

            //  used_in_forms are of these types you can use forms key according to your need ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address', 'customer_account_create']

            $attribute->setData(
                'used_in_forms',
                ['adminhtml_product']

            );
            $attribute->save();

        }

        $setup->endSetup();
    }
}