<?php

namespace XPack\ML\Endpoints\Filter;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package XPack\Graph\Endpoints\Xpack\Ml\Filter
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractEndpoint
{
    // The ID of the filter to create
    private $filter_id;

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
     * @param $filter_id
     *
     * @return $this
     */
    public function setFilterId($filter_id)
    {
        if (isset($filter_id) !== true) {
            return $this;
        }
        $this->filter_id = $filter_id;
        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->filter_id) !== true) {
            throw new Exceptions\RuntimeException(
                'filter_id is required for Put'
            );
        }
        $filter_id = $this->filter_id;
        $uri = "/_xpack/ml/filters/$filter_id";
        if (isset($filter_id) === true) {
            $uri = "/_xpack/ml/filters/$filter_id";
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
            throw new Exceptions\RuntimeException('Body is required for Put');
        }
        return $this->body;
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'PUT';
    }
}