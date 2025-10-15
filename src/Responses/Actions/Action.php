<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\Actions;

/**
 * Action Response
 *
 * This class represents an action object in API responses
 * from the Hetzner Cloud API.
 */
final class Action
{
    /**
     * Create a new action response instance.
     *
     * @param  array<string, mixed>  $data  The action data from the API
     */
    public function __construct(
        private readonly array $data
    ) {}

    /**
     * Get the action ID.
     */
    public function id(): int
    {
        return $this->data['id'] ?? 0;
    }

    /**
     * Get the action command.
     */
    public function command(): string
    {
        return $this->data['command'] ?? '';
    }

    /**
     * Get the action status.
     */
    public function status(): string
    {
        return $this->data['status'] ?? '';
    }

    /**
     * Get the action progress percentage.
     */
    public function progress(): int
    {
        return $this->data['progress'] ?? 0;
    }

    /**
     * Get when the action started.
     */
    public function started(): string
    {
        return $this->data['started'] ?? '';
    }

    /**
     * Get when the action finished.
     */
    public function finished(): ?string
    {
        return $this->data['finished'] ?? null;
    }

    /**
     * Get the action resources.
     *
     * @return array<string, mixed>
     */
    public function resources(): array
    {
        return $this->data['resources'] ?? [];
    }

    /**
     * Get the action error information.
     *
     * @return array<string, mixed>|null
     */
    public function error(): ?array
    {
        return $this->data['error'] ?? null;
    }

    /**
     * Convert the action to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
