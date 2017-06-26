<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Close
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Job
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Close extends AbstractEndpoint
{
    // The name of the job to close
    private $job_id;

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
                'job_id is required for Close'
            );
        }
        $job_id = $this->job_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/_close";
        if (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/_close";
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