<?php

namespace Boci\HetznerLaravel\Requests\ServerTypes;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Server Type Request
 *
 * This request class is used to retrieve a specific server type by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve server type request instance.
     *
     * @param  string  $serverTypeId  The ID of the server type to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $serverTypeId,
        array $parameters = [],
    ) {
        parent::__construct($parameters);
    }

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'GET';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/server_types/{$this->serverTypeId}";
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
