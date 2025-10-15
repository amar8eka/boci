<?php

namespace Boci\HetznerLaravel\Requests\Locations;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve Location Request
 *
 * This request class is used to retrieve a specific location by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve location request instance.
     *
     * @param  string  $locationId  The ID of the location to retrieve
     * @param  array<string, mixed>  $parameters  Optional additional parameters
     */
    public function __construct(
        private readonly string $locationId,
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
        return "/v1/locations/{$this->locationId}";
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
