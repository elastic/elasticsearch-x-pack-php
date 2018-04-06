<?php

namespace XPack\ML\Endpoints\Model;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package XPack\ML\Endpoints\Model
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    // The ID of the job to fetch
    private $job_id;
    // The ID of the snapshot to delete
    private $snapshot_id;

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
                'job_id is required for Delete'
            );
        }
        if (isset($this->snapshot_id) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot_id is required for Delete'
            );
        }
        $job_id = $this->job_id;
        $snapshot_id = $this->snapshot_id;
        $uri = "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id";
        if (isset($job_id) === true && isset($snapshot_id) === true) {
            $uri = "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id";
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
        return 'DELETE';
    }
}