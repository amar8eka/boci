<?php

namespace Boci\HetznerLaravel\Responses\ServerActions;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Server Console Response
 *
 * This response class represents the response from getting
 * server console access in the Hetzner Cloud API.
 */
final class ConsoleResponse extends Response
{
    /**
     * Get the action from the response.
     */
    public function action(): Action
    {
        return new Action($this->data['action']);
    }

    /**
     * Get the WebSocket URL for console access.
     */
    public function wssUrl(): string
    {
        return $this->data['wss_url'];
    }

    /**
     * Get the console password.
     */
    public function password(): string
    {
        return $this->data['password'];
    }
}
