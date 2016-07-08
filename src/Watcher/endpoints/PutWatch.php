<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class PutWatch
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class PutWatch extends AbstractWatcherEndpoint
{

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            throw new Exceptions\RuntimeException(
                'body is required for PutWatch'
            );
        }

        $this->body = $body;
        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for PutWatch'
            );
        }
        return "/_watcher/watch/{$this->id}";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'master_timeout',
            'active'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "PUT";
    }
}