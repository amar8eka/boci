<?php

namespace Boci\HetznerLaravel\Responses\Servers;

/**
 * Server Metrics Response
 *
 * This response class represents server metrics from
 * the Hetzner Cloud API.
 */
final class ServerMetrics
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * Get the metrics start time.
     */
    public function start(): string
    {
        return $this->data['start'];
    }

    /**
     * Get the metrics end time.
     */
    public function end(): string
    {
        return $this->data['end'];
    }

    /**
     * Get the metrics step interval.
     */
    public function step(): int
    {
        return $this->data['step'];
    }

    /**
     * Get the time series data.
     *
     * @return array<string, mixed>
     */
    public function timeSeries(): array
    {
        return $this->data['time_series'] ?? [];
    }

    /**
     * Get the CPU metrics.
     *
     * @return array<string, mixed>
     */
    public function cpu(): array
    {
        return $this->data['time_series']['cpu'] ?? [];
    }

    /**
     * Get the disk metrics.
     *
     * @return array<string, mixed>
     */
    public function disk(): array
    {
        return $this->data['time_series']['disk'] ?? [];
    }

    /**
     * Get the network metrics.
     *
     * @return array<string, mixed>
     */
    public function network(): array
    {
        return $this->data['time_series']['network'] ?? [];
    }

    /**
     * Convert the metrics to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
