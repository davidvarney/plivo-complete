<?php

namespace DavidVarney\Plivo;

use Plivo\RestAPI as PlivoRestApi;

class Plivo extends PlivoRestApi
{
    protected $auth_id;
    protected $auth_token;

    public function __construct(array $config)
    {
        $this->auth_id = $config['auth_id'];
        $this->auth_token = $config['auth_token'];

        parent::__construct($this->auth_id, $this->auth_token);
    }
}
