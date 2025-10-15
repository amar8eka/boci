<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\DnsZoneActions;

use Boci\HetznerLaravel\Responses\Response;

/**
 * DNS Zone Action Response
 *
 * This response class represents the response from a DNS zone action
 * in the Hetzner Cloud API.
 */
final class ActionResponse extends Response
{
    /**
     * Get the action from the response.
     */
    public function action(): Action
    {
        return new Action($this->data['action']);
    }

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters for the fake response
     */
    public static function fake(array $parameters = []): self
    {
        $command = $parameters['command'] ?? 'change_nameservers';
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
