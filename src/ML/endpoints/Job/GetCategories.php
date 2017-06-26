<?php

namespace XPack\ML\Endpoints\Job;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetCategories
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Job;
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetCategories extends AbstractEndpoint
{
    // The name of the job
    private $job_id;
    // The identifier of the category definition of interest
    private $category_id;

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
     * @param $category_id
     *
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        if (isset($category_id) !== true) {
            return $this;
        }
        $this->category_id = $category_id;
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
        $category_id = $this->category_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/categories/";
        if (isset($job_id) === true && isset($category_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/categories/$category_id";
        } elseif (isset($job_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/results/categories/";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'from',
            'size',
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