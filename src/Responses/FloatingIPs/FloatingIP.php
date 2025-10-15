<?php

namespace Boci\HetznerLaravel\Responses\FloatingIPs;

final class FloatingIP
{
    /**
     * @param  array<string, mixed>  $data
     */
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    public function id(): int
    {
        return $this->data['id'];
    }

    public function name(): string
    {
        return $this->data['name'];
    }

    public function description(): string
    {
        return $this->data['description'];
    }

    public function ip(): string
    {
        return $this->data['ip'];
    }

    public function type(): string
    {
        return $this->data['type'];
    }

    public function server(): ?int
    {
        return $this->data['server'] ?? null;
    }

    /**
     * @return array<string, mixed>
     */
    public function dnsPtr(): array
    {
        return $this->data['dns_ptr'] ?? [];
    }

    /**
     * @return array<string, mixed>
     */
    public function homeLocation(): array
    {
        return $this->data['home_location'];
    }

    public function blocked(): bool
    {
        return $this->data['blocked'];
    }

    /**
     * @return array<string, mixed>
     */
    public function protection(): array
    {
        return $this->data['protection'];
    }

    /**
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
