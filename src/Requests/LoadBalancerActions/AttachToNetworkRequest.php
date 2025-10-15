<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Attach Load Balancer to Network Request
 *
 * This request class is used to attach a load balancer to a network
 * in the Hetzner Cloud API.
 */
final class AttachToNetworkRequest implements RequestContract
{
    /**
     * Create a new attach load balancer to network request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The network attachment parameters
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/attach_to_network";
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
