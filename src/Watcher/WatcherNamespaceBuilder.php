<?php


namespace XPack\Watcher;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class WatcherNamespaceBuilder
 *
 * @category Watcher
 * @package  XPack\Watcher\WatcherNamespaceBuilder
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastics.co
 */
class WatcherNamespaceBuilder implements NamespaceBuilderInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return "watcher";
    }

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return WatcherNamespace
     */
    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new WatcherNamespace($transport, null);
    }
}