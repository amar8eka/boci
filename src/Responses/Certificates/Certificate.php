<?php

namespace Boci\HetznerLaravel\Responses\Certificates;

/**
 * Certificate Response
 *
 * This class represents a certificate object in API responses
 * from the Hetzner Cloud API.
 */
final class Certificate
{
    /**
     * Create a new certificate response instance.
     *
     * @param  array<string, mixed>  $data  The certificate data from the API
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the certificate ID.
     */
    public function id(): int
    {
        return $this->data['id'];
    }

    /**
     * Get the certificate name.
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * Get the certificate type.
     */
    public function type(): string
    {
        return $this->data['type'];
    }

    /**
     * Get the certificate content.
     */
    public function certificate(): ?string
    {
        return $this->data['certificate'] ?? null;
    }

    /**
     * Get the private key.
     */
    public function privateKey(): ?string
    {
        return $this->data['private_key'] ?? null;
    }

    /**
     * Get the certificate fingerprint.
     */
    public function fingerprint(): ?string
    {
        return $this->data['fingerprint'] ?? null;
    }

    /**
     * Get when the certificate is valid from.
     */
    public function notValidBefore(): ?string
    {
        return $this->data['not_valid_before'] ?? null;
    }

    /**
     * Get when the certificate is valid until.
     */
    public function notValidAfter(): ?string
    {
        return $this->data['not_valid_after'] ?? null;
    }

    /**
     * Get the domain names for the certificate.
     *
     * @return array<string, mixed>
     */
    public function domainNames(): array
    {
        return $this->data['domain_names'] ?? [];
    }

    /**
     * Get the certificate labels.
     *
     * @return array<string, mixed>
     */
    public function labels(): array
    {
        return $this->data['labels'] ?? [];
    }

    /**
     * Get when the certificate was created.
     */
    public function created(): string
    {
        return $this->data['created'];
    }

    /**
     * Convert the certificate to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
