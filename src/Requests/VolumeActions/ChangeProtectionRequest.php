<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\VolumeActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Change Volume Protection Request
 *
 * This request class is used to change the protection settings of a volume
 * in the Hetzner Cloud API.
 */
final class ChangeProtectionRequest implements RequestContract
{
    /**
     * Create a new change volume protection request instance.
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  array<string, mixed>  $parameters  The protection settings to change
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
        return "/v1/volumes/{$this->volumeId}/actions/change_protection";
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
