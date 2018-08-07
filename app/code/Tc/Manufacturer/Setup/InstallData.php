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


        $setup->endSetup();

    }
}