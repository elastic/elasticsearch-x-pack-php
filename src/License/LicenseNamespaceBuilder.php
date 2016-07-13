<?php


namespace XPack\License;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class LicenseNamespaceBuilder
 *
 * @category Graph
 * @package  XPack\License\LicenseNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class LicenseNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "license";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return LicenseNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new LicenseNamespace($transport, null);
    }
}