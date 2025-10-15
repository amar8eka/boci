<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\VolumeActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Resize Volume Request
 *
 * This request class is used to resize a volume
 * in the Hetzner Cloud API.
 */
final class ResizeRequest implements RequestContract
{
    /**
     * Create a new resize volume request instance.
     *
     * @param  string  $volumeId  The ID of the volume to resize
     * @param  array<string, mixed>  $parameters  The resize parameters (e.g., new size)
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
        return 'POST';
    }

    /**
     * Get the URI for this request.
     */
    public function uri(): string
    {
        return "/v1/volumes/{$this->volumeId}/actions/resize";
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
