<?php

namespace Tutorial\SimpleNews\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;

    /**
     * Init
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        // Get tutorial_simplenews table
        $tableName = $setup->getTable('manufacturer');
        // Check if the table already exists
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            // Declare data
            $data = [
                [
                    'name' => 'How to create a simple module',
                    'logo_url' => 'The summary',
                    'description' => 'The description',
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_date' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Create a module with custom database table',
                    'logo_url' => 'The summary',
                    'description' => 'The description',
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_date' => date('Y-m-d H:i:s'),
                ]
            ];


        }

        // Insert data to table
        foreach ($data as $item) {
            $setup->getConnection()->insert($tableName, $item);
        }

        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'manufacturer',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Manufacturer',
                'input' => 'select',
                'source' => 'Tc\Manufacturer\Model\Attribute\Source\Manufacturer',
                'backend' => 'Tc\Manufacturer\Model\Attribute\Backend\Manufacturer',
                'required' => false,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => false
            ]
        );



        $setup->endSetup();
    }
}