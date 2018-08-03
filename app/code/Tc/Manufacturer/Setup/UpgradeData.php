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

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
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

                // Insert data to table
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }

        if (version_compare($context->getVersion(), '1.0.2') < 0) {
        
        }

        $setup->endSetup();
    }
}