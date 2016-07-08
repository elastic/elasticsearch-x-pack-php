<?php

namespace XPack\Monitoring;

use Elasticsearch\Namespaces\AbstractNamespace;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class MonitoringNamespace
 *
 * @category Graph
 * @package  XPack\Monitoring\MonitoringNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastics.co
 */
class MonitoringNamespace extends AbstractNamespace
{
    /** @var  SerializerInterface */
    protected $serializer;

    public function __construct(Transport $transport, $endpoints, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        parent::__construct($transport, $endpoints);
    }

    /**
     * $params['type']               = (string) Default document type for items which don't provide one
     *        ['system_id']          = (string) Identifier of the monitored system
     *        ['system_api_version'] = (string) API Version of the monitored system
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function bulk($params)
    {
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new Endpoints\Bulk($this->serializer);
        $endpoint->setType($type)
            ->setBody($body)
            ->setParams($params);
        $response = $this->performRequest($endpoint);
        return $endpoint->resultOrFuture($response);
    }


}