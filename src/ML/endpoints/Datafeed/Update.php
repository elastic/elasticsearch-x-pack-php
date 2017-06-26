<?php

namespace XPack\ML\Endpoints\Datafeed;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Update
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Datafeed
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Update extends AbstractEndpoint
{
    // The ID of the datafeed to update
    private $datafeed_id;

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;
        return $this;
    }


    /**
     * @param $datafeed_id
     *
     * @return $this
     */
    public function setDatafeedId($datafeed_id)
    {
        if (isset($datafeed_id) !== true) {
            return $this;
        }
        $this->datafeed_id = $datafeed_id;
        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->datafeed_id) !== true) {
            throw new Exceptions\RuntimeException(
                'datafeed_id is required for Update'
            );
        }
        $datafeed_id = $this->datafeed_id;
        $uri = "/_xpack/ml/datafeeds/$datafeed_id/_update";
        if (isset($datafeed_id) === true) {
            $uri = "/_xpack/ml/datafeeds/$datafeed_id/_update";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array();
    }


    /**
     * @return array
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Update');
        }
        return $this->body;
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}