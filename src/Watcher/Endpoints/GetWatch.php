<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class GetWatch
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class GetWatch extends AbstractWatcherEndpoint
{


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for GetWatch'
            );
        }
        return "/_xpack/watcher/watch/{$this->id}";
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
        return "GET";
    }
}