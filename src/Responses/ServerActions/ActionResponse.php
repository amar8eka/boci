<?php

namespace Boci\HetznerLaravel\Responses\ServerActions;

use Boci\HetznerLaravel\Responses\Response;

/**
 * Server Action Response
 *
 * This response class represents the response from a server action
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
}
