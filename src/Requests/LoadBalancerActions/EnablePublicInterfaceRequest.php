<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Enable Load Balancer Public Interface Request
 *
 * This request class is used to enable the public interface of a load balancer
 * in the Hetzner Cloud API.
 */
final class EnablePublicInterfaceRequest implements RequestContract
{
    /**
     * Create a new enable load balancer public interface request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     */
    public function __construct(
        private readonly string $loadBalancerId
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/enable_public_interface";
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
