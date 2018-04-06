<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class AckWatch
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class AckWatch extends AbstractWatcherEndpoint
{


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for AckWatch'
            );
        }

        return "/_xpack/watcher/watch/{$this->id}/_ack";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'master_timeout',
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