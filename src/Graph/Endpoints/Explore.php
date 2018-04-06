<?php


namespace XPack\Graph\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Explore
 *
 * @category Explore
 * @package  XPack\Graph\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Explore extends AbstractEndpoint
{

    /**
     * @param array $body
     *
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
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Explore'
            );
        }

        if (isset($this->type) === true) {
            return "/{$this->index}/$this->{type}/_xpack/graph/_explore";
        } else {
            return "/{$this->index}/_xpack/graph/_explore";
        }
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'routing',
            'timeout'
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