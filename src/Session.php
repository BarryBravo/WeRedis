<?php
namespace Thinfer\WeRedis;

use Redis;

/**
 * Store PHP's sessions data into Redis without implemention of SessionHandlerInterface.
 *
 * @author Barry Shieh <seeyagain173@gmail.com>
 */
class Session
{
    protected $client;
    
    protected $ttl;
    
    /**
     * @param Redis $client  Fully initialized client instance.
     * @param int   $ttl     Max life time.
     */
    public function __construct(Redis $client, $ttl)
    {
        $this->client = $client;
        $this->ttl = (int) $ttl;
    }

    /**
     * @param string @session_id
     */
    public function get($session_id)
    {
        if ($data = $this->client->get($session_id)) {
            return $data;
        }
        return '';
    }
    
    /**
     * @param string $session_id
     * @param string $session_data
     */
    public function set($session_id, $session_data)
    {
        $this->client->setex($session_id, $this->ttl, $session_data);
        return true;
    }
    
    /**
     * @param string $session_id
     */
    public function del($session_id)
    {
        $this->client->del($session_id);
        return true;
    }
}