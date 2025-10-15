<?php

namespace Boci\HetznerLaravel\Responses\Locations;

/**
 * Location Response
 *
 * This response class represents a location response from
 * the Hetzner Cloud API.
 */
final class Location
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the location ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the location name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the location description.
     */
    public function description(): string
    {
        return $this->data['description'];
    }

    /**
     * Get the country.
     */
    public function country(): string
    {
        return $this->data['country'];
    }

    /**
     * Get the city.
     */
    public function city(): string
    {
        return $this->data['city'];
    }

    /**
     * Get the latitude coordinate.
     */
    public function latitude(): float
    {
        return $this->data['latitude'];
    }

    /**
     * Get the longitude coordinate.
     */
    public function longitude(): float
    {
        return $this->data['longitude'];
    }

    /**
     * Get the network zone.
     */
    public function networkZone(): string
    {
        return $this->data['network_zone'];
    }

    /**
     * Convert the location to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
