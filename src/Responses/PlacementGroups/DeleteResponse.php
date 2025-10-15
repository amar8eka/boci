<?php

namespace Boci\HetznerLaravel\Responses\PlacementGroups;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Delete Placement Group Response
 *
 * This response class represents the response from deleting
 * a placement group in the Hetzner Cloud API.
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
        $placementGroupId = $parameters['placementGroupId'] ?? '1';

        $data = [
            'action' => [
                'id' => 1,
                'command' => 'delete_placement_group',
                'status' => 'running',
                'progress' => 0,
                'started' => '2016-01-30T23:50:00+00:00',
                'finished' => null,
                'resources' => [
                    [
                        'id' => (int) $placementGroupId,
                        'type' => 'placement_group',
                    ],
                ],
                'error' => null,
            ],
        ];
        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
