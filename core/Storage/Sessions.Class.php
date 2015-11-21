<?php 

namespace Storage;

use Cache;

class Sessions implements \SessionHandlerInterface {
		
	// 1hour
    public $ttl = 10080; 

    protected $db;
    protected $prefix = 'PHPSESSID:';

    public function __construct() {
        $this->db = Cache::init();
    }

    public function open($savePath, $sessionName) {
        // No action necessary because connection is injected
        // in constructor and arguments are not applicable.
    }

    public function close() {
        $this->db = null;
        unset($this->db);
    }

    public function read ($id) {
        $id = $this->prefix.$id;
        $sessData = $this->db->get($id);
        $this->db->expire($id, $this->ttl);
        return $sessData;
    }

    public function write ($id, $data) {
        $id = $this->prefix.$id;
        $this->db->set($id, $data);
        $this->db->expire($id, $this->ttl);
    }

    public function destroy ($id) {
        $this->db->del($this->prefix.$id);
    }

    public function gc ($maxLifetime) {
        // no action necessary because using EXPIRE
    }

}