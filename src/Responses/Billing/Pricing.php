<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\Billing;

/**
 * Pricing Response
 *
 * This class represents pricing information in API responses
 * from the Hetzner Cloud API.
 */
final class Pricing
{
    /**
     * Create a new pricing response instance.
     *
     * @param  array<string, mixed>  $data  The pricing data from the API
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the currency.
     */
    public function currency(): string
    {
        return $this->data['currency'];
    }

    /**
     * Get the VAT rate.
     */
    public function vatRate(): string
    {
        return $this->data['vat_rate'];
    }

    /**
     * Get the image pricing information.
     *
     * @return array<string, mixed>
     */
    public function image(): array
    {
        return $this->data['image'] ?? [];
    }

    /**
     * Get the floating IP pricing information.
     *
     * @return array<string, mixed>
     */
    public function floatingIp(): array
    {
        return $this->data['floating_ip'] ?? [];
    }

    /**
     * Get the floating IP type pricing information.
     *
     * @return array<string, mixed>
     */
    public function floatingIpType(): array
    {
        return $this->data['floating_ip_type'] ?? [];
    }

    /**
     * Get the load balancer type pricing information.
     *
     * @return array<string, mixed>
     */
    public function loadBalancerType(): array
    {
        return $this->data['load_balancer_type'] ?? [];
    }

    /**
     * Get the primary IP pricing information.
     *
     * @return array<string, mixed>
     */
    public function primaryIp(): array
    {
        return $this->data['primary_ip'] ?? [];
    }

    /**
     * Get the primary IP type pricing information.
     *
     * @return array<string, mixed>
     */
    public function primaryIpType(): array
    {
        return $this->data['primary_ip_type'] ?? [];
    }

    /**
     * Get the server type pricing information.
     *
     * @return array<string, mixed>
     */
    public function serverType(): array
    {
        return $this->data['server_type'] ?? [];
    }

    /**
     * Get the traffic pricing information.
     *
     * @return array<string, mixed>
     */
    public function traffic(): array
    {
        return $this->data['traffic'] ?? [];
    }

    /**
     * Get the volume pricing information.
     *
     * @return array<string, mixed>
     */
    public function volume(): array
    {
        return $this->data['volume'] ?? [];
    }

    /**
     * Convert the pricing to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
