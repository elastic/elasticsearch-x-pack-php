<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetJobs
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Jobs
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetJobs extends AbstractEndpoint
{
    // The ID of the jobs to fetch
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
     * @return string
     */
    public function getURI()
    {
        $job_id = $this->job_id;
        $uri = "/_xpack/ml/anomaly_detectors/";
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
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}