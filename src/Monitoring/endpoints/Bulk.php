<?php


namespace XPack\Monitoring\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\BulkEndpointInterface;
use Elasticsearch\Serializers\SerializerInterface;

/**
 * Class Bulk
 *
 * @category Explore
 * @package  XPack\Monitoring\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string|array|\Traversable $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        if (empty($body)) {
            return $this;
        }

        if (is_array($body) === true || $body instanceof \Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } else {
            $this->body = $body;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->type) === true) {
            return "/_xpack/monitoring/{$this->type}/_bulk";
        } else {
            return "/_xpack/monitoring/_bulk";
        }
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'system_id',
            'system_api_version'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "POST";
    }
}