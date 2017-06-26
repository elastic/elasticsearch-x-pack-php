<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package XPack\Graph\Endpoints\Xpack\Ml\Records
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetRecords extends AbstractEndpoint
{
    // 
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
                'job_id is required for Get'
            );
        }
        $job_id = $this->job_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/records";
        if (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/records";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'record_score',
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