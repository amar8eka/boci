<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Get Load Balancer Action Request
 *
 * This request class is used to retrieve a specific action for a load balancer
 * from the Hetzner Cloud API.
 */
final class GetActionRequest implements RequestContract
{
    /**
     * Create a new get load balancer action request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  string  $actionId  The ID of the action to retrieve
     */
    public function __construct(
        private readonly string $loadBalancerId,
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/{$this->actionId}";
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
