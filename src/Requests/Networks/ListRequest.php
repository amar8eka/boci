<?php

namespace Boci\HetznerLaravel\Requests\Networks;

use Boci\HetznerLaravel\Requests\Request;

/**
 * List Networks Request
 *
 * This request class is used to retrieve a list of networks
 * from the Hetzner Cloud API with optional filtering parameters.
 */
final class ListRequest extends Request
{
    /**
     * Create a new list networks request instance.
     *
     * @param  array<string, mixed>  $parameters  Optional filtering parameters
     */
    public function __construct(array $parameters = [])
    {
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
        return '/v1/networks';
    }
}
