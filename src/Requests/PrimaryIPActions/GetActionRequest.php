<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Get Primary IP Action Request
 *
 * This request class is used to retrieve a specific action for a primary IP
 * from the Hetzner Cloud API.
 */
final class GetActionRequest implements RequestContract
{
    /**
     * Create a new get primary IP action request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(
        private readonly string $primaryIpId,
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
        return "/v1/primary_ips/{$this->primaryIpId}/actions/{$this->actionId}";
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
