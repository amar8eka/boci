<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\Volumes;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Create Volume Request
 *
 * This request class is used to create a new volume
 * in the Hetzner Cloud API.
 */
final class CreateRequest implements RequestContract
{
    /**
     * Create a new create volume request instance.
     *
     * @param  array<string, mixed>  $parameters  The volume creation parameters
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
        return '/v1/volumes';
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
