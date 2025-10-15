<?php

namespace Boci\HetznerLaravel\Responses\PlacementGroups;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Update Placement Group Response
 *
 * This response class represents the response from updating
 * a placement group in the Hetzner Cloud API.
 */
final class UpdateResponse extends Response
{
    /**
     * Get the placement group from the response.
     */
    public function placementGroup(): PlacementGroup
    {
        return new PlacementGroup($this->data['placement_group']);
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
            'placement_group' => [
                'id' => (int) $placementGroupId,
                'name' => $parameters['name'] ?? 'updated-placement-group-name',
                'labels' => $parameters['labels'] ?? [
                    'environment' => 'production',
                    'team' => 'backend',
                ],
                'type' => 'spread',
                'created' => '2016-01-30T23:50:00+00:00',
                'servers' => [4711, 4712],
            ],
        ];
        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
