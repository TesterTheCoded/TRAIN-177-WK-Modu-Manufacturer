<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 03.08.18
 * Time: 13:17
 */

namespace Tc\Manufacturer\Block\Adminhtml;
use Magento\Backend\Block\Widget\Context;


class GenericButton
{
    protected $context;
    public function __construct(Context $context)
    {
        $this->context = $context;
    }
    public function getId()
    {
        return $this->context->getRequest()->getParam('id');
    }
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}