<?php

use App\Mcp\Servers\RebirthServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::local('local', RebirthServer::class);
