<?php
///**
// * Created by PhpStorm.
// * User: weronikakrzynowek
// * Date: 06.08.18
// * Time: 14:02
// */
//
//namespace Tc\Manufacturer\Setup;
//
//class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
//{
//    public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
//    {
//        $setup->startSetup();
//
//        if (version_compare($context->getVersion(), '1.0.1') < 0) {
//
//            $setup->getConnection()->addColumn(
//                $setup->getTable('eav_attribute'),
//                'manufacturer',
//                [
//                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                    'nullable' => true,
//                    'comment' => 'manufacturer'
//                ]
//            );
//        }
//
//        $setup->endSetup();
//    }
//}