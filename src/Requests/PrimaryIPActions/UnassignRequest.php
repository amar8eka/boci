<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Unassign Primary IP Request
 *
 * This request class is used to unassign a primary IP from a resource
 * in the Hetzner Cloud API.
 */
final class UnassignRequest implements RequestContract
{
    /**
     * Create a new unassign primary IP request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP to unassign
     */
    public function __construct(
        private readonly string $primaryIpId
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
        return "/v1/primary_ips/{$this->primaryIpId}/actions/unassign";
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
