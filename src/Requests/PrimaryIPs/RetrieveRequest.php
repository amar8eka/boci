<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPs;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Retrieve Primary IP Request
 *
 * This request class is used to retrieve a specific primary IP by its ID
 * from the Hetzner Cloud API.
 */
final class RetrieveRequest implements RequestContract
{
    /**
     * Create a new retrieve primary IP request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP to retrieve
     */
    public function __construct(
        private readonly string $primaryIpId
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
        return "/v1/primary_ips/{$this->primaryIpId}";
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
