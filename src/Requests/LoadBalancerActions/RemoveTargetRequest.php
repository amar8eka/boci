<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Remove Load Balancer Target Request
 *
 * This request class is used to remove a target from a load balancer
 * in the Hetzner Cloud API.
 */
final class RemoveTargetRequest implements RequestContract
{
    /**
     * Create a new remove load balancer target request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The target removal parameters
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/remove_target";
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
