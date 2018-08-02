<?php
/**
 * Created by PhpStorm.
 * User: weronikakrzynowek
 * Date: 23.07.18
 * Time: 12:45
 */

namespace Tc\Manufacturer\Block\Adminhtml\Edit;
use Magento\Search\Controller\RegistryConstants;

class GenericButton
{
    protected $urlBuilder;
    protected $registry;

    public function __construct(\Magento\Backend\Block\Widget\Context $context,
                                \Magento\Framework\Registry $registry)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId()
    {
        $contact = $this->registry->registry('manufacturer');
        return $contact ? $contact->getID() : null;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}