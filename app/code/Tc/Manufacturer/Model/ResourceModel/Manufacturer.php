<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 16.07.18
 * Time: 13:42
 */

namespace Tc\Manufacturer\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Manufacturer extends AbstractDb
{
    public function __construct(Context $context)
    {
      parent::__construct($context);
    }
    /**
     * Initialize resource
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('manufacturer', 'id');
    }
}