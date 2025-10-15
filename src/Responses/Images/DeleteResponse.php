<?php

namespace Boci\HetznerLaravel\Responses\Images;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Delete Image Response
 *
 * This response class represents the response from deleting
 * an image in the Hetzner Cloud API.
 */
final class DeleteResponse extends Response
{
    /**
     * Get the action from the response.
     */
    public function action(): \Boci\HetznerLaravel\Responses\ServerActions\Action
    {
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
                'command' => 'delete_image',
                'status' => 'success',
                'progress' => 100,
                'started' => '2023-01-01T00:00:00+00:00',
                'finished' => '2023-01-01T00:00:01+00:00',
                'resources' => [
                    [
                        'id' => (int) ($parameters['imageId'] ?? 1),
                        'type' => 'image',
                    ],
                ],
                'error' => null,
            ],
        ];
        $meta = new \Boci\HetznerLaravel\Meta\MetaInformation;

        return new self($data, $meta);
    }
}
