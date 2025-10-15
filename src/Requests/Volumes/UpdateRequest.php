<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\Volumes;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Update Volume Request
 *
 * This request class is used to update a volume's properties
 * in the Hetzner Cloud API.
 */
final class UpdateRequest implements RequestContract
{
    /**
     * Create a new update volume request instance.
     *
     * @param  string  $volumeId  The ID of the volume to update
     * @param  array<string, mixed>  $parameters  The update parameters
     */
    public function __construct(
        private readonly string $volumeId,
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
        return "/v1/volumes/{$this->volumeId}";
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
