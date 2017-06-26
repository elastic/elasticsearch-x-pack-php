<?php

namespace XPack\ML\Endpoints\Model;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Revert
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Model
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Revert extends AbstractEndpoint
{
    // The ID of the job to fetch
    private $job_id;
    // The ID of the snapshot to revert to
    private $snapshot_id;

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
     * @param $snapshot_id
     *
     * @return $this
     */
    public function setSnapshotId($snapshot_id)
    {
        if (isset($snapshot_id) !== true) {
            return $this;
        }
        $this->snapshot_id = $snapshot_id;
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
                'job_id is required for Revert'
            );
        }
        $job_id = $this->job_id;
        $snapshot_id = $this->snapshot_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id/_revert";
        if (isset($job_id) === true && isset($snapshot_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id/_revert";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'delete_intervening_results',
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