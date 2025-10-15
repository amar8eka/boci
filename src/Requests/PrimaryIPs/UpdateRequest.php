<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPs;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Update Primary IP Request
 *
 * This request class is used to update a primary IP's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest implements RequestContract
{
    /**
     * Create a new update primary IP request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $primaryIpId,
        private readonly array $parameters
    ) {}

    /**
     * Get the HTTP method for this request.
     */
    public function method(): string
    {
        return 'PUT';
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
        return [
            'json' => $this->parameters,
        ];
    }
}
