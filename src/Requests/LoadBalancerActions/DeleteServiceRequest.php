<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Requests\LoadBalancerActions;

use Boci\HetznerLaravel\Contracts\RequestContract;

/**
 * Delete Load Balancer Service Request
 *
 * This request class is used to delete a service from a load balancer
 * in the Hetzner Cloud API.
 */
final class DeleteServiceRequest implements RequestContract
{
    /**
     * Create a new delete load balancer service request instance.
     *
     * @param  string  $loadBalancerId  The ID of the load balancer
     * @param  array<string, mixed>  $parameters  The service deletion parameters
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
        return "/v1/load_balancers/{$this->loadBalancerId}/actions/delete_service";
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
