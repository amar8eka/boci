<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Detach ISO from Server Request
 *
 * This request class is used to detach an ISO from a server
 * in the Hetzner Cloud API.
 */
final class DetachIsoRequest extends Request
{
    /**
     * Create a new detach ISO from server request instance.
     *
     * @param  string  $serverId  The ID of the server
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
        return "/v1/servers/{$this->serverId}/actions/detach_iso";
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
