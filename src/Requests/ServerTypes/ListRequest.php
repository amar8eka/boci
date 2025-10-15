<?php

namespace Boci\HetznerLaravel\Requests\ServerTypes;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Server Types Request
 *
 * This request class is used to retrieve a list of server types
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListRequest extends Request
{
    /**
     * Create a new list server types request instance.
     *
     * @param  array<string, mixed>  $parameters  Optional filtering parameters
     */
    public function __construct(
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
        return '/v1/server_types';
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'query' => $this->parameters,
        ];
    }
}
