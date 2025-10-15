<?php

namespace Boci\HetznerLaravel\Responses\Firewalls;

/**
 * Firewall Response
 *
 * This class represents a firewall object in API responses
 * from the Hetzner Cloud API.
 */
final class Firewall
{
    /**
     * Create a new firewall response instance.
     *
     * @param  array<string, mixed>  $data  The firewall data from the API
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the firewall ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the firewall name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the firewall labels.
     *
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    /**
     * Get when the firewall was created.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Get the firewall rules.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return $this->data['rules'] ?? [];
    }

    /**
     * Get the resources the firewall is applied to.
     *
     * @return array<string, mixed>
     */
    public function appliedTo(): array
    {
        return $this->data['applied_to'] ?? [];
    }

    /**
     * Convert the firewall to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
