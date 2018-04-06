<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Open
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Job
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Open extends AbstractEndpoint
{
    // The ID of the job to open
    private $job_id;
    // Controls if gaps in data are treated as anomalous or as a maintenance window after a job re-start
    private $ignore_downtime;
    // Controls the time to wait until a job has opened. Default to 30 minutes
    private $timeout;

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
     * @param $ignore_downtime
     *
     * @return $this
     */
    public function setIgnoreDowntime($ignore_downtime)
    {
        if (isset($ignore_downtime) !== true) {
            return $this;
        }
        $this->ignore_downtime = $ignore_downtime;
        return $this;
    }

    /**
     * @param $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        if (isset($timeout) !== true) {
            return $this;
        }
        $this->timeout = $timeout;
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
                'job_id is required for Open'
            );
        }
        $job_id = $this->job_id;
        $ignore_downtime = $this->ignore_downtime;
        $timeout = $this->timeout;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/_open";
        if (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/_open";
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
        return 'POST';
    }
}