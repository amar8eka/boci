<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\DnsZones;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Import DNS Zone Response
 *
 * This response class represents the response from importing
 * a DNS zone in the Hetzner Cloud API.
 */
final class ImportResponse extends Response
{
    /**
     * Get the DNS zone from the response.
     */
    public function zone(): DnsZone
    {
        return new DnsZone($this->data['zone']);
    }

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters for the fake response
     */
    public static function fake(array $parameters = []): self
    {
        $data = [
            'zone' => [
                'id' => $parameters['name'] ?? 'imported.com',
                'name' => $parameters['name'] ?? 'imported.com',
                'ttl' => 3600,
                'created' => '2023-01-01T00:00:00+00:00',
                'modified' => '2023-01-01T00:00:00+00:00',
                'is_secondary_dns' => false,
                'legacy_dns_host' => 'legacy-dns.example.com',
                'legacy_ns' => ['ns1.example.com', 'ns2.example.com'],
                'ns' => ['ns1.example.com', 'ns2.example.com'],
                'owner' => 'admin@example.com',
                'paused' => false,
                'permission' => 'full_access',
                'project' => 'my-project',
                'registrar' => 'example-registrar',
                'status' => 'verified',
                'verified' => '2023-01-01T00:00:00+00:00',
                'records_count' => 3,
                'is_primary_dns' => true,
            ],
        ];

        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
