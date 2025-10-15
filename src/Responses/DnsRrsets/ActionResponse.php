<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\DnsRrsets;

use Boci\HetznerLaravel\Responses\Response;

/**
 * DNS RRSet Action Response
 *
 * This response class represents the response from a DNS RRSet action
 * in the Hetzner Cloud API.
 */
final class ActionResponse extends Response
{
    /**
     * Get the action from the response.
     */
    public function action(): \Boci\HetznerLaravel\Responses\DnsZoneActions\Action
    {
        return new \Boci\HetznerLaravel\Responses\DnsZoneActions\Action($this->data['action']);
    }

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters for the fake response
     */
    public static function fake(array $parameters = []): self
    {
        $command = $parameters['command'] ?? 'change_ttl';
        $zoneIdOrName = $parameters['zoneIdOrName'] ?? 'example.com';
        $actionId = $parameters['actionId'] ?? '1';

        $data = [
            'action' => [
                'id' => (int) $actionId,
                'command' => $command,
                'status' => 'running',
                'progress' => 0,
                'started' => '2023-01-01T00:00:00+00:00',
                'finished' => null,
                'resources' => [
                    [
                        'id' => $zoneIdOrName,
                        'type' => 'zone',
                    ],
                ],
                'error' => null,
            ],
        ];

        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
