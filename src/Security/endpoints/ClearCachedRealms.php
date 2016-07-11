<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class ClearCachedRealms
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class ClearCachedRealms extends AbstractEndpoint
{
    /** @var  string */
    protected $realms;

    /**
     * @param $realms
     * @return $this
     */
    public function setRealms($realms)
    {
        if (isset($realms) !== true) {
            return $this;
        }
        $this->realms = $realms;
        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->realms) !== true) {
            throw new Exceptions\RuntimeException(
                'realms is required for ClearCachedRealms'
            );
        }
        return "/_xpack/security/realm/{$this->realms}/_clear_cache";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'usernames'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "POST";
    }
}