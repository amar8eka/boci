<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\VolumeActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Attach Volume Request
 *
 * This request class is used to attach a volume to a server
 * in the Hetzner Cloud API.
 */
final class AttachRequest implements RequestContract
{
    /**
     * Create a new attach volume request instance.
     *
     * @param  string  $volumeId  The ID of the volume to attach
     * @param  array<string, mixed>  $parameters  The attachment parameters (e.g., server ID)
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
        return "/v1/volumes/{$this->volumeId}/actions/attach";
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
