<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\PrimaryIPActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Change Primary IP Reverse DNS Request
 *
 * This request class is used to change the reverse DNS settings of a primary IP
 * in the Hetzner Cloud API.
 */
final class ChangeReverseDnsRequest implements RequestContract
{
    /**
     * Create a new change primary IP reverse DNS request instance.
     *
     * @param  string  $primaryIpId  The ID of the primary IP
     * @param  array<string, mixed>  $parameters  The reverse DNS settings to change
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
        return "/v1/primary_ips/{$this->primaryIpId}/actions/change_dns_ptr";
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
