<?php

namespace Boci\HetznerLaravel\Responses\ServerActions;

use Boci\HetznerLaravel\Responses\Response;

/**
 * List Server Actions Response
 *
 * This response class represents the response from listing
 * server actions in the Hetzner Cloud API.
 */
final class ListActionsResponse extends Response
{
    /**
     * Get the actions from the response.
     *
     * @return Action[]
     */
    public function actions(): array
    {
        return array_map(
            fn (array $action) => new Action($action),
            $this->data['actions']
        );
    }
}
