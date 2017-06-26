<?php


namespace XPack\ML;

use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class MLNamespaceBuilder
 *
 * @category ML
 * @package  XPack\ML\MLNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MLNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "ml";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return MLNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new MLNamespace($transport, null);
    }
}