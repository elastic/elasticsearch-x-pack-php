<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class PutUser
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class PutUser extends AbstractEndpoint
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
     * @param $body
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
     * @return string
     */
    public function getURI()
    {
        if (isset($this->username) !== true) {
            throw new Exceptions\RuntimeException(
                'username is required for PutUser'
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
        return "PUT";
    }
}