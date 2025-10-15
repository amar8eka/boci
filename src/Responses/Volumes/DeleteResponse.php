<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\Volumes;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Delete Volume Response
 *
 * This response class represents the response from deleting
 * a volume in the Hetzner Cloud API.
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
     * @param  array<string, mixed>  $parameters  Optional parameters for the fake response
     */
    public static function fake(array $parameters = []): self
    {
        $volumeId = $parameters['volumeId'] ?? '1';

        $data = [
            'action' => [
                'id' => 1,
                'command' => 'delete_volume',
                'status' => 'running',
                'progress' => 0,
                'started' => '2023-01-01T00:00:00+00:00',
                'finished' => null,
                'resources' => [
                    [
                        'id' => (int) $volumeId,
                        'type' => 'volume',
                    ],
                ],
                'error' => null,
            ],
        ];

        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
