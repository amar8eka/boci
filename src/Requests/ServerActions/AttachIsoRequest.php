<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Attach ISO to Server Request
 *
 * This request class is used to attach an ISO to a server
 * in the Hetzner Cloud API.
 */
final class AttachIsoRequest extends Request
{
    /**
     * Create a new attach ISO to server request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The ISO attachment parameters
     */
    public function __construct(
        private readonly string $serverId,
        array $parameters = [],
    ) {
        parent::__construct($parameters);
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
        return "/v1/servers/{$this->serverId}/actions/attach_iso";
    }
}
