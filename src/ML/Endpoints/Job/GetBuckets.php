<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetBuckets
 *
 * @category Elasticsearch
 * @package XPack\Graph\Endpoints\Xpack\Ml\Buckets
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetBuckets extends AbstractEndpoint
{
    // ID of the job to get bucket results from
    private $job_id;
    // The timestamp of the desired single bucket result
    private $timestamp;

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
     * @param $timestamp
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        if (isset($timestamp) !== true) {
            return $this;
        }
        $this->timestamp = $timestamp;
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
                'job_id is required for Get'
            );
        }
        $job_id = $this->job_id;
        $timestamp = $this->timestamp;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/buckets";
        if (isset($job_id) === true && isset($timestamp) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/buckets/$timestamp";
        } elseif (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/buckets";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'expand',
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'anomaly_score',
            'sort',
            'desc',
        );
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        //TODO Fix Me!
        return 'GET';
    }
}