<?php

namespace XPack\ML\Endpoints\Datafeed;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stop
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Datafeed
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stop extends AbstractEndpoint
{
    // The ID of the datafeed to stop
    private $datafeed_id;

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
                'datafeed_id is required for Stop'
            );
        }
        $datafeed_id = $this->datafeed_id;
        $uri = "/_xpack/ml/datafeeds/$datafeed_id/_stop";
        if (isset($datafeed_id) === true) {
            $uri = "/_xpack/ml/datafeeds/$datafeed_id/_stop";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'force',
            'timeout',
        );
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}