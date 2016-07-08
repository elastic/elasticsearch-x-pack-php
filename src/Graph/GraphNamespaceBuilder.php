<?php


namespace XPack\Graph;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class GraphNamespaceBuilder
 *
 * @category Graph
 * @package  XPack\Graph\GraphNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastics.co
 */
class GraphNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "graph";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return GraphNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new GraphNamespace($transport, null);
    }
}