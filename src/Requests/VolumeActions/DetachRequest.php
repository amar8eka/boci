<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\VolumeActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Detach Volume Request
 *
 * This request class is used to detach a volume from a server
 * in the Hetzner Cloud API.
 */
final class DetachRequest implements RequestContract
{
    /**
     * Create a new detach volume request instance.
     *
     * @param  string  $volumeId  The ID of the volume to detach
     */
    public function __construct(
        private readonly string $volumeId
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
        return "/v1/volumes/{$this->volumeId}/actions/detach";
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
