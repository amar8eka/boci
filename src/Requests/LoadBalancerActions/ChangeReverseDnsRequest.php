<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Change Load Balancer Reverse DNS Request
 *
 * This request class is used to change the reverse DNS settings of a load balancer
 * in the Hetzner Cloud API.
 */
final class ChangeReverseDnsRequest implements RequestContract
{
    /**
     * Create a new change load balancer reverse DNS request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The reverse DNS settings to change
     */
    public function __construct(
        private readonly string $loadBalancerId,
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/change_dns_ptr";
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
