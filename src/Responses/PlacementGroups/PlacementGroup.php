<?php

namespace Boci\HetznerLaravel\Responses\PlacementGroups;

/**
 * Placement Group Response
 *
 * This response class represents a placement group response from
 * the Hetzner Cloud API.
 */
final class PlacementGroup
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the placement group ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the placement group name.
     */
    public function name(): string
    {
        return $this->data['name'];
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
     * Get the placement group type.
     */
    public function type(): string
    {
        return $this->data['type'];
    }

    /**
     * Get when the placement group was created.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Get the servers in the placement group.
     *
     * @return array<string, mixed>
     */
    public function servers(): array
    {
        return $this->data['servers'] ?? [];
    }

    /**
     * Convert the placement group to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
