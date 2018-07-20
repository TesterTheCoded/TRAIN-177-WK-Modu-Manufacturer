<?php
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
            $tableName = $setup->getTable('manufacturer');
            if ($setup->getConnection()->isTableExists($tableName) == true) {
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
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }
        $setup->endSetup();
    }
}