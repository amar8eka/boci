<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\Volumes;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Retrieve Volume Request
 *
 * This request class is used to retrieve a specific volume by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest implements RequestContract
{
    /**
     * Create a new retrieve volume request instance.
     *
     * @param  string  $volumeId  The ID of the volume to retrieve
     */
    public function __construct(
        private readonly string $volumeId
    ) {}

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
        return "/v1/volumes/{$this->volumeId}";
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
