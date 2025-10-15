<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\VolumeActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Get Volume Action Request
 *
 * This request class is used to retrieve a specific action for a volume
 * from the Hetzner Cloud API.
 */
final class GetActionRequest implements RequestContract
{
    /**
     * Create a new get volume action request instance.
     *
     * @param  string  $volumeId  The ID of the volume
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(
        private readonly string $volumeId,
        private readonly string $actionId
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
        return "/v1/volumes/{$this->volumeId}/actions/{$this->actionId}";
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
