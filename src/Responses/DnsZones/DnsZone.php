<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\DnsZones;

/**
 * DNS Zone Response
 *
 * This response class represents a DNS zone response from
 * the Hetzner Cloud API.
 */
final class DnsZone
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the zone ID.
     */
    public function id(): string
    {
        return $this->data['id'];
    }

    /**
     * Get the zone name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the zone TTL.
     */
    public function ttl(): int
    {
        return $this->data['ttl'];
    }

    /**
     * Get when the zone was created.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Get when the zone was last modified.
     */
    public function modified(): string
    {
        return $this->data['modified'];
    }

    /**
     * Check if this is a secondary DNS zone.
     */
    public function isSecondaryDns(): bool
    {
        return $this->data['is_secondary_dns'] ?? false;
    }

    /**
     * Get the legacy DNS host.
     */
    public function legacyDnsHost(): ?string
    {
        return $this->data['legacy_dns_host'] ?? null;
    }

    /**
     * Get the legacy nameservers.
     *
     * @return string[]
     */
    public function legacyNs(): array
    {
        return $this->data['legacy_ns'] ?? [];
    }

    /**
     * Get the nameservers.
     *
     * @return string[]
     */
    public function ns(): array
    {
        return $this->data['ns'] ?? [];
    }

    /**
     * Get the zone owner.
     */
    public function owner(): string
    {
        return $this->data['owner'];
    }

    /**
     * Check if the zone is paused.
     */
    public function paused(): bool
    {
        return $this->data['paused'] ?? false;
    }

    /**
     * Get the zone permission.
     */
    public function permission(): string
    {
        return $this->data['permission'];
    }

    /**
     * Get the zone project.
     */
    public function project(): string
    {
        return $this->data['project'];
    }

    /**
     * Get the zone registrar.
     */
    public function registrar(): ?string
    {
        return $this->data['registrar'] ?? null;
    }

    /**
     * Get the zone status.
     */
    public function status(): string
    {
        return $this->data['status'];
    }

    /**
     * Get when the zone was verified.
     */
    public function verified(): ?string
    {
        return $this->data['verified'] ?? null;
    }

    /**
     * Get the records count.
     */
    public function recordsCount(): int
    {
        return $this->data['records_count'] ?? 0;
    }

    /**
     * Check if this is a primary DNS zone.
     */
    public function isPrimaryDns(): bool
    {
        return $this->data['is_primary_dns'] ?? true;
    }

    /**
     * Convert the DNS zone to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
