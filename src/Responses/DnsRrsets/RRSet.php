<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\DnsRrsets;

/**
 * DNS RRSet Response
 *
 * This response class represents a DNS RRSet response from
 * the Hetzner Cloud API.
 */
final class RRSet
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the RRSet name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the RRSet type.
     */
    public function type(): string
    {
        return $this->data['type'];
    }

    /**
     * Get the RRSet TTL.
     */
    public function ttl(): int
    {
        return $this->data['ttl'];
    }

    /**
     * Get the RRSet records.
     *
     * @return array<string, mixed>[]
     */
    public function records(): array
    {
        return $this->data['records'] ?? [];
    }

    /**
     * Convert the RRSet to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
