<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\PrimaryIPs;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Update Primary IP Response
 *
 * This response class represents the response from updating
 * a primary IP in the Hetzner Cloud API.
 */
final class UpdateResponse extends Response
{
    /**
     * Get the primary IP from the response.
     */
    public function primaryIp(): PrimaryIP
    {
        return new PrimaryIP($this->data['primary_ip']);
    }

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters for the fake response
     */
    public static function fake(array $parameters = []): self
    {
        $primaryIpId = $parameters['primaryIpId'] ?? '1';

        $data = [
            'primary_ip' => [
                'id' => (int) $primaryIpId,
                'name' => $parameters['name'] ?? 'updated-primary-ip',
                'ip' => '1.2.3.4',
                'type' => 'ipv4',
                'assignee_id' => null,
                'assignee_type' => null,
                'auto_delete' => false,
                'blocked' => false,
                'created' => '2023-01-01T00:00:00+00:00',
                'datacenter' => [
                    'id' => 1,
                    'name' => 'nbg1-dc3',
                    'description' => 'Nuremberg 1 DC 3',
                    'location' => [
                        'id' => 1,
                        'name' => 'nbg1',
                        'description' => 'Nuremberg',
                        'country' => 'DE',
                        'city' => 'Nuremberg',
                        'latitude' => 49.4521,
                        'longitude' => 11.0767,
                        'network_zone' => 'eu-central',
                    ],
                    'server_types' => [
                        'supported' => [1, 2, 3],
                        'available' => [1, 2, 3],
                        'available_for_migration' => [1, 2, 3],
                    ],
                ],
                'dns_ptr' => [
                    [
                        'ip' => '1.2.3.4',
                        'dns_ptr' => 'primary-ip.example.com',
                    ],
                ],
                'home_location' => [
                    'id' => 1,
                    'name' => 'nbg1',
                    'description' => 'Nuremberg',
                    'country' => 'DE',
                    'city' => 'Nuremberg',
                    'latitude' => 49.4521,
                    'longitude' => 11.0767,
                    'network_zone' => 'eu-central',
                ],
                'labels' => $parameters['labels'] ?? [],
                'protection' => [
                    'delete' => false,
                ],
            ],
        ];

        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
