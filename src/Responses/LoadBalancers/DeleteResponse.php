<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\LoadBalancers;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Delete Load Balancer Response
 *
 * This response class represents the response from deleting
 * a load balancer in the Hetzner Cloud API.
 */
final class DeleteResponse extends Response
{
    /**
     * Get the action from the response.
     */
    public function action(): ?\Boci\HetznerLaravel\Responses\ServerActions\Action
    {
        if (! isset($this->data['action'])) {
            return null;
        }

        return new \Boci\HetznerLaravel\Responses\ServerActions\Action($this->data['action']);
    }

    /**
     * Create a fake response for testing.
     *
     * @param  array<string, mixed>  $parameters  Optional parameters
     */
    public static function fake(array $parameters = []): self
    {
        $data = [
            'action' => [
                'id' => 1,
                'command' => 'delete_load_balancer',
                'status' => 'running',
                'progress' => 0,
                'started' => '2023-01-01T00:00:00+00:00',
                'finished' => null,
                'resources' => [
                    [
                        'id' => (int) ($parameters['loadBalancerId'] ?? '1'),
                        'type' => 'load_balancer',
                    ],
                ],
                'error' => null,
            ],
        ];
        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
