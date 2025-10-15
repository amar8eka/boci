<?php

namespace Boci\HetznerLaravel\Requests\ServerActions;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Create Server Image Request
 *
 * This request class is used to create an image from a server
 * in the Hetzner Cloud API.
 */
final class CreateImageRequest extends Request
{
    /**
     * Create a new create server image request instance.
     *
     * @param  string  $serverId  The ID of the server
     * @param  array<string, mixed>  $parameters  The image creation parameters
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
        return "/v1/servers/{$this->serverId}/actions/create_image";
    }
}
