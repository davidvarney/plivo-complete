<?php

namespace DavidVarney\Plivo;

use Plivo\RestAPI as PlivoRestApi;

class Plivo extends PlivoRestApi
{
    protected $auth_id;
    protected $auth_token;
    protected $config;

    public function __construct()
    {
        $this->config = config('plivo');
        $this->auth_id = $this->config['auth_id'];
        $this->auth_token = $this->config['auth_token'];

        parent::__construct($this->auth_id, $this->auth_token);
    }
}
