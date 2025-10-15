<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\LoadBalancers;

/**
 * Load Balancer Response
 *
 * This response class represents a load balancer response from
 * the Hetzner Cloud API.
 */
final class LoadBalancer
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the load balancer ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the load balancer name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the public network configuration.
     *
     * @return array<string, mixed>
     */
    public function publicNet(): array
    {
        return $this->data['public_net'];
    }

    /**
     * Get the private network configuration.
     *
     * @return array<string, mixed>
     */
    public function privateNet(): array
    {
        return $this->data['private_net'] ?? [];
    }

    /**
     * Get the location information.
     *
     * @return array<string, mixed>
     */
    public function location(): array
    {
        return $this->data['location'];
    }

    /**
     * Get the load balancer type information.
     *
     * @return array<string, mixed>
     */
    public function loadBalancerType(): array
    {
        return $this->data['load_balancer_type'];
    }

    /**
     * Get the load balancing algorithm configuration.
     *
     * @return array<string, mixed>
     */
    public function algorithm(): array
    {
        return $this->data['algorithm'];
    }

    /**
     * Get the load balancer services.
     *
     * @return array<string, mixed>
     */
    public function services(): array
    {
        return $this->data['services'] ?? [];
    }

    /**
     * Get the load balancer targets.
     *
     * @return array<string, mixed>
     */
    public function targets(): array
    {
        return $this->data['targets'] ?? [];
    }

    /**
     * Get the protection settings.
     *
     * @return array<string, mixed>
     */
    public function protection(): array
    {
        return $this->data['protection'] ?? [];
    }

    /**
     * Get the labels.
     *
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    /**
     * Get when the load balancer was created.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Get the included traffic amount.
     */
    public function includedTraffic(): int
    {
        return $this->data['included_traffic'] ?? 0;
    }

    /**
     * Get the ingoing traffic amount.
     */
    public function ingoingTraffic(): int
    {
        return $this->data['ingoing_traffic'] ?? 0;
    }

    /**
     * Get the outgoing traffic amount.
     */
    public function outgoingTraffic(): int
    {
        return $this->data['outgoing_traffic'] ?? 0;
    }

    /**
     * Convert the load balancer to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
