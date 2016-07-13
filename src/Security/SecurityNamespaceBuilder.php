<?php


namespace XPack\Security;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class SecurityNamespaceBuilder
 *
 * @category Graph
 * @package  XPack\Security\SecurityNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SecurityNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "security";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return SecurityNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new SecurityNamespace($transport, null);
    }
}