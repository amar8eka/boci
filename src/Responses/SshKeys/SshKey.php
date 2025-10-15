<?php

namespace Boci\HetznerLaravel\Responses\SshKeys;

/**
 * SSH Key Response
 *
 * This class represents an SSH key object returned from the Hetzner Cloud API.
 * It provides convenient access to SSH key properties and data.
 */
final class SshKey
{
    /**
     * Create a new SSH key response instance.
     *
     * @param  array<string, mixed>  $data  The SSH key data from the API
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the SSH key ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the SSH key name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the SSH key fingerprint.
     */
    public function fingerprint(): string
    {
        return $this->data['fingerprint'];
    }

    /**
     * Get the SSH public key.
     */
    public function publicKey(): string
    {
        return $this->data['public_key'];
    }

    /**
     * Get the SSH key labels.
     *
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    /**
     * Get the SSH key creation date.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Convert the SSH key data to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
