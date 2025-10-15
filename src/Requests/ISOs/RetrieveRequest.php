<?php

namespace Boci\HetznerLaravel\Requests\ISOs;

use Boci\HetznerLaravel\Requests\Request;

/**
 * Retrieve ISO Request
 *
 * This request class is used to retrieve a specific ISO by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest extends Request
{
    /**
     * Create a new retrieve ISO request instance.
     *
     * @param  string  $isoId  The ID of the ISO to retrieve
     */
    public function __construct(
        private readonly string $isoId,
    ) {
        parent::__construct();
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
        return "/v1/isos/{$this->isoId}";
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
