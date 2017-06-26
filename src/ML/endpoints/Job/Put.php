<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Job
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractEndpoint
{
    // The ID of the job to create
    private $job_id;

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
     * @param $job_id
     *
     * @return $this
     */
    public function setJobId($job_id)
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;
        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for Put'
            );
        }
        $job_id = $this->job_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id";
        if (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id";
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