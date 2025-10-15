<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Assign Primary IP Request
 *
 * This request class is used to assign a primary IP to a resource
 * in the Hetzner Cloud API.
 */
final class AssignRequest implements RequestContract
{
    /**
     * Create a new assign primary IP request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  The assignment parameters (e.g., assignee ID)
     */
    public function __construct(
        private readonly string $primaryIpId,
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
        return "/v1/primary_ips/{$this->primaryIpId}/actions/assign";
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
