<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Stats
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Stats extends AbstractEndpoint
{
    /** @var  string */
    protected $metric;

    public function setMetric($metric)
    {
        if (isset($metric) !== true) {
            return $this;
        }
        $this->metric = $metric;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $uri = "/_xpack/watcher/stats";
        if (isset($this->metric) === true) {
            $uri .= "/{$this->metric}";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'metric'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "GET";
    }
}