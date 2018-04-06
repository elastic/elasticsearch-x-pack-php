<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class DeleteUser
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class DeleteUser extends AbstractEndpoint
{
    /** @var  string */
    protected $username;

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        if (isset($username) !== true) {
            return $this;
        }
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->username) !== true) {
            throw new Exceptions\RuntimeException(
                'username is required for ClearCachedRoles'
            );
        }
        return "/_xpack/security/user/{$this->username}";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'refresh'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "DELETE";
    }
}