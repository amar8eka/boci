<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\Volumes;

/**
 * Volume Response
 *
 * This response class represents a volume response from
 * the Hetzner Cloud API.
 */
final class Volume
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the volume ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the volume name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the volume status.
     */
    public function status(): string
    {
        return $this->data['status'];
    }

    /**
     * Get the server ID this volume is attached to.
     */
    public function server(): ?int
    {
        return $this->data['server'] ?? null;
    }

    /**
     * Get the volume location information.
     *
     * @return array<string, mixed>
     */
    public function location(): array
    {
        return $this->data['location'];
    }

    /**
     * Get the volume size in GB.
     */
    public function size(): int
    {
        return $this->data['size'];
    }

    /**
     * Get the Linux device path.
     */
    public function linuxDevice(): string
    {
        return $this->data['linux_device'];
    }

    /**
     * Get the volume protection settings.
     *
     * @return array<string, mixed>
     */
    public function protection(): array
    {
        return $this->data['protection'] ?? [];
    }

    /**
     * Get the volume labels.
     *
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    /**
     * Get the volume creation date.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Convert the volume to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
