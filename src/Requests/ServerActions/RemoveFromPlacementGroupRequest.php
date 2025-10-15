<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Remove Server from Placement Group Request
 *
 * This request class is used to remove a server from a placement group
 * in the Hetzner Cloud API.
 */
final class RemoveFromPlacementGroupRequest extends Request
{
    /**
     * Create a new remove server from placement group request instance.
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
        return "/v1/servers/{$this->serverId}/actions/remove_from_placement_group";
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
