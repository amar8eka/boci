<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Power Off Server Request
 *
 * This request class is used to power off a server
 * in the Hetzner Cloud API.
 */
final class PowerOffRequest extends Request
{
    /**
     * Create a new power off server request instance.
     *
     * @param  string  $serverId  The ID of the server to power off
     */
    public function __construct(
        private readonly string $serverId,
    ) {
        parent::__construct();
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/servers/{$this->serverId}/actions/poweroff";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [];
    }
}
