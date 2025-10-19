<?php

namespace Boci\HetznerLaravel\Requests\Networks;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Create Network Request
 *
 * This request class is used to create a new network
 * in the Hetzner Cloud API.
 */
final class CreateRequest extends Request
{
    /**
     * Create a new create network request instance.
     *
     * @param  array<string, mixed>  $parameters  The network creation parameters
     */
    public function __construct(array $parameters)
    {
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
        return '/v1/networks';
    }
}
