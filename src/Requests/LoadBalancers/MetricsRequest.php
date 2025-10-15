<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancers;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Load Balancer Metrics Request
 *
 * This request class is used to retrieve metrics for a specific load balancer
 * from the Hetzner Cloud API.
 */
final class MetricsRequest implements RequestContract
{
    /**
     * Create a new load balancer metrics request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  Optional query parameters for metrics filtering
     */
    public function __construct(
        private readonly string $loadBalancerId,
        private readonly array $parameters = []
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
        return "/v1/load_balancers/{$this->loadBalancerId}/metrics";
    }

    /**
     * Get the request options for the HTTP client.
     *
     * @return array<string, mixed>
     */
    public function options(): array
    {
        return [
            'query' => $this->parameters,
        ];
    }
}
