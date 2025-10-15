<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Enable Server Backups Request
 *
 * This request class is used to enable backups for a server
 * in the Hetzner Cloud API.
 */
final class EnableBackupsRequest extends Request
{
    /**
     * Create a new enable server backups request instance.
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
        return "/v1/servers/{$this->serverId}/actions/enable_backup";
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
