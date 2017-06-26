<?php

namespace XPack\ML\Endpoints\Datafeed;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Datafeed
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    // The ID of the datafeeds stats to fetch
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
     * @return string
     */
    public function getURI()
    {
        $datafeed_id = $this->datafeed_id;
        $uri = "/_xpack/ml/datafeeds/_stats";
        if (isset($datafeed_id) === true) {
            $uri = "/_xpack/ml/datafeeds/$datafeed_id/_stats";
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
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}