<?php


namespace XPack\Monitoring;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class MonitoringNamespaceBuilder
 *
 * @category Monitoring
 * @package  XPack\Monitoring\MonitoringNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastics.co
 */
class MonitoringNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "monitoring";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return MonitoringNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new MonitoringNamespace($transport, null, $serializer);
    }
}