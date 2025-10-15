<?php

namespace Boci\HetznerLaravel\Responses\ISOs;

/**
 * ISO Response
 *
 * This response class represents an ISO response from
 * the Hetzner Cloud API.
 */
final class ISO
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the ISO ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the ISO name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the ISO description.
     */
    public function description(): string
    {
        return $this->data['description'];
    }

    /**
     * Get the ISO type.
     */
    public function type(): string
    {
        return $this->data['type'];
    }

    /**
     * Get when the ISO was deprecated.
     */
    public function deprecated(): ?string
    {
        return $this->data['deprecated'] ?? null;
    }

    /**
     * Convert the ISO to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
