<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPs;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Create Primary IP Request
 *
 * This request class is used to create a new primary IP
 * in the Hetzner Cloud API.
 */
final class CreateRequest implements RequestContract
{
    /**
     * Create a new create primary IP request instance.
     *
     * @param  array<string, mixed>  $parameters  The primary IP creation parameters
     */
    public function __construct(
        private readonly array $parameters
    ) {}

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
        return '/v1/primary_ips';
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
