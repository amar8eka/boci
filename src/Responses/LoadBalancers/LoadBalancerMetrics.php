<?php

declare(strict_types=1);

namespace Boci\HetznerLaravel\Responses\LoadBalancers;

/**
 * Load Balancer Metrics Response
 *
 * This response class represents load balancer metrics from
 * the Hetzner Cloud API.
 */
final class LoadBalancerMetrics
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        private readonly array $data
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
     * Convert the metrics to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
