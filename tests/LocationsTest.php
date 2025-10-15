<?php

declare(strict_types=1);

namespace Tests;

use Boci\HetznerLaravel\Responses\Locations\ListResponse;
use Boci\HetznerLaravel\Responses\Locations\Location;
use Boci\HetznerLaravel\Responses\Locations\RetrieveResponse;
use Boci\HetznerLaravel\Testing\TestCase;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * Locations Test Suite
 *
 * This test suite covers all functionality related to the Locations resource,
 * including listing and retrieving locations.
 */
final class LocationsTest extends TestCase
{
    /**
     * Test listing locations with fake data
     */
    public function test_can_list_locations_with_fake_data(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();

        $this->assertInstanceOf(ListResponse::class, $response);
        $this->assertIsArray($response->locations());
        $this->assertCount(5, $response->locations());

        $locations = $response->locations();
        $this->assertInstanceOf(Location::class, $locations[0]);
        $this->assertEquals(1, $locations[0]->id());
        $this->assertEquals('nbg1', $locations[0]->name());
        $this->assertEquals('Nuremberg DC 1', $locations[0]->description());
        $this->assertEquals('DE', $locations[0]->country());
        $this->assertEquals('Nuremberg', $locations[0]->city());
        $this->assertEquals(49.4521, $locations[0]->latitude());
        $this->assertEquals(11.0767, $locations[0]->longitude());
        $this->assertEquals('eu-central', $locations[0]->networkZone());

        $this->assertInstanceOf(Location::class, $locations[1]);
        $this->assertEquals(2, $locations[1]->id());
        $this->assertEquals('fsn1', $locations[1]->name());
        $this->assertEquals('Falkenstein DC 1', $locations[1]->description());
        $this->assertEquals('DE', $locations[1]->country());
        $this->assertEquals('Falkenstein', $locations[1]->city());
        $this->assertEquals(50.4761, $locations[1]->latitude());
        $this->assertEquals(12.3703, $locations[1]->longitude());
        $this->assertEquals('eu-central', $locations[1]->networkZone());

        $pagination = $response->pagination();
        $this->assertEquals(1, $pagination['current_page']);
        $this->assertEquals(25, $pagination['per_page']);
        $this->assertEquals(5, $pagination['total']);
        $this->assertEquals(1, $pagination['last_page']);
        $this->assertFalse($pagination['has_more_pages']);

        $this->assertRequestWasMade($requests, 'locations', 'list');
    }

    /**
     * Test listing locations with custom response
     */
    public function test_can_list_locations_with_custom_response(): void
    {
        $requests = [];
        $responses = [
            new Response(200, [], json_encode([
                'locations' => [
                    [
                        'id' => 42,
                        'name' => 'custom1',
                        'description' => 'Custom Location 1',
                        'country' => 'US',
                        'city' => 'New York',
                        'latitude' => 40.7128,
                        'longitude' => -74.0060,
                        'network_zone' => 'us-east',
                    ],
                    [
                        'id' => 43,
                        'name' => 'custom2',
                        'description' => 'Custom Location 2',
                        'country' => 'GB',
                        'city' => 'London',
                        'latitude' => 51.5074,
                        'longitude' => -0.1278,
                        'network_zone' => 'eu-west',
                    ],
                ],
                'meta' => [
                    'pagination' => [
                        'page' => 1,
                        'per_page' => 25,
                        'previous_page' => null,
                        'next_page' => null,
                        'last_page' => 1,
                        'total_entries' => 2,
                    ],
                ],
            ]) ?: ''),
        ];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();

        $this->assertInstanceOf(ListResponse::class, $response);
        $this->assertCount(2, $response->locations());

        $location1 = $response->locations()[0];
        $this->assertEquals(42, $location1->id());
        $this->assertEquals('custom1', $location1->name());
        $this->assertEquals('Custom Location 1', $location1->description());
        $this->assertEquals('US', $location1->country());
        $this->assertEquals('New York', $location1->city());
        $this->assertEquals(40.7128, $location1->latitude());
        $this->assertEquals(-74.0060, $location1->longitude());
        $this->assertEquals('us-east', $location1->networkZone());

        $location2 = $response->locations()[1];
        $this->assertEquals(43, $location2->id());
        $this->assertEquals('custom2', $location2->name());
        $this->assertEquals('Custom Location 2', $location2->description());
        $this->assertEquals('GB', $location2->country());
        $this->assertEquals('London', $location2->city());
        $this->assertEquals(51.5074, $location2->latitude());
        $this->assertEquals(-0.1278, $location2->longitude());
        $this->assertEquals('eu-west', $location2->networkZone());

        $this->assertRequestWasMade($requests, 'locations', 'list');
    }

    /**
     * Test listing locations with query parameters
     */
    public function test_can_list_locations_with_query_parameters(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $parameters = [
            'page' => 2,
            'per_page' => 10,
            'name' => 'nbg1',
        ];

        $response = $client->locations()->list($parameters);

        $this->assertInstanceOf(ListResponse::class, $response);

        $this->assertRequestWasMade($requests, 'locations', 'list');
    }

    /**
     * Test retrieving a specific location
     */
    public function test_can_retrieve_specific_location(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $locationId = 'nbg1';
        $response = $client->locations()->retrieve($locationId);

        $this->assertInstanceOf(RetrieveResponse::class, $response);
        $this->assertInstanceOf(Location::class, $response->location());

        $location = $response->location();
        $this->assertEquals(1, $location->id());
        $this->assertEquals('nbg1', $location->name());
        $this->assertEquals('Nuremberg DC 1', $location->description());
        $this->assertEquals('DE', $location->country());
        $this->assertEquals('Nuremberg', $location->city());
        $this->assertEquals(49.4521, $location->latitude());
        $this->assertEquals(11.0767, $location->longitude());
        $this->assertEquals('eu-central', $location->networkZone());

        $this->assertRequestWasMade($requests, 'locations', 'retrieve');
    }

    /**
     * Test retrieving location with custom response
     */
    public function test_can_retrieve_location_with_custom_response(): void
    {
        $requests = [];
        $responses = [
            new Response(200, [], json_encode([
                'location' => [
                    'id' => 99,
                    'name' => 'hel1',
                    'description' => 'Helsinki DC 1',
                    'country' => 'FI',
                    'city' => 'Helsinki',
                    'latitude' => 60.1699,
                    'longitude' => 24.9384,
                    'network_zone' => 'eu-central',
                ],
            ]) ?: ''),
        ];
        $client = $this->fakeClient($responses, $requests);

        $locationId = 'hel1';
        $response = $client->locations()->retrieve($locationId);

        $this->assertInstanceOf(RetrieveResponse::class, $response);
        $location = $response->location();

        $this->assertEquals(99, $location->id());
        $this->assertEquals('hel1', $location->name());
        $this->assertEquals('Helsinki DC 1', $location->description());
        $this->assertEquals('FI', $location->country());
        $this->assertEquals('Helsinki', $location->city());
        $this->assertEquals(60.1699, $location->latitude());
        $this->assertEquals(24.9384, $location->longitude());
        $this->assertEquals('eu-central', $location->networkZone());

        $this->assertRequestWasMade($requests, 'locations', 'retrieve');
    }

    /**
     * Test location response structure
     */
    public function test_location_response_structure(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $location = $response->locations()[0];

        // Test all location properties
        $this->assertIsInt($location->id());
        $this->assertIsString($location->name());
        $this->assertIsString($location->description());
        $this->assertIsString($location->country());
        $this->assertIsString($location->city());
        $this->assertIsFloat($location->latitude());
        $this->assertIsFloat($location->longitude());
        $this->assertIsString($location->networkZone());

        // Test location names
        $this->assertContains($location->name(), ['nbg1', 'fsn1', 'hel1', 'ash', 'hil']);

        // Test toArray method
        $locationArray = $location->toArray();
        $this->assertIsArray($locationArray);
        $this->assertArrayHasKey('id', $locationArray);
        $this->assertArrayHasKey('name', $locationArray);
        $this->assertArrayHasKey('description', $locationArray);
        $this->assertArrayHasKey('country', $locationArray);
        $this->assertArrayHasKey('city', $locationArray);
        $this->assertArrayHasKey('latitude', $locationArray);
        $this->assertArrayHasKey('longitude', $locationArray);
        $this->assertArrayHasKey('network_zone', $locationArray);
    }

    /**
     * Test handling location API exception
     */
    public function test_can_handle_location_api_exception(): void
    {
        $requests = [];
        $responses = [
            new RequestException('Location not found', new Request('GET', '/locations/nonexistent')),
        ];
        $client = $this->fakeClient($responses, $requests);

        $this->expectException(RequestException::class);
        $this->expectExceptionMessage('Location not found');

        $client->locations()->retrieve('nonexistent');
    }

    /**
     * Test handling location list exception
     */
    public function test_can_handle_location_list_exception(): void
    {
        $requests = [];
        $responses = [
            new RequestException('Rate limit exceeded', new Request('GET', '/locations')),
        ];
        $client = $this->fakeClient($responses, $requests);

        $this->expectException(RequestException::class);
        $this->expectExceptionMessage('Rate limit exceeded');

        $client->locations()->list();
    }

    /**
     * Test handling mixed location response types
     */
    public function test_can_handle_mixed_location_response_types(): void
    {
        $requests = [];
        $responses = [
            new Response(200, [], json_encode([
                'locations' => [
                    [
                        'id' => 1,
                        'name' => 'nbg1',
                        'description' => 'Nuremberg DC 1',
                        'country' => 'DE',
                        'city' => 'Nuremberg',
                        'latitude' => 49.4521,
                        'longitude' => 11.0767,
                        'network_zone' => 'eu-central',
                    ],
                ],
                'meta' => [
                    'pagination' => [
                        'page' => 1,
                        'per_page' => 25,
                        'previous_page' => null,
                        'next_page' => null,
                        'last_page' => 1,
                        'total_entries' => 1,
                    ],
                ],
            ]) ?: ''),
            new RequestException('Location not found', new Request('GET', '/locations/nonexistent')),
        ];
        $client = $this->fakeClient($responses, $requests);

        // First call should succeed
        $listResponse = $client->locations()->list();
        $this->assertInstanceOf(ListResponse::class, $listResponse);
        $this->assertCount(1, $listResponse->locations());

        // Second call should throw exception
        $this->expectException(RequestException::class);
        $this->expectExceptionMessage('Location not found');
        $client->locations()->retrieve('nonexistent');
    }

    /**
     * Test using individual location fake
     */
    public function test_using_individual_location_fake(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $locationsFake = $client->locations();

        $response = $locationsFake->list(['page' => 1, 'per_page' => 5]);

        $this->assertInstanceOf(ListResponse::class, $response);
        $this->assertCount(5, $response->locations());

        $this->assertRequestWasMade($requests, 'locations', 'list');
    }

    /**
     * Test location pagination structure
     */
    public function test_location_pagination_structure(): void
    {
        $requests = [];
        $responses = [
            new Response(200, [], json_encode([
                'locations' => [
                    [
                        'id' => 1,
                        'name' => 'nbg1',
                        'description' => 'Nuremberg DC 1',
                        'country' => 'DE',
                        'city' => 'Nuremberg',
                        'latitude' => 49.4521,
                        'longitude' => 11.0767,
                        'network_zone' => 'eu-central',
                    ],
                ],
                'meta' => [
                    'pagination' => [
                        'page' => 2,
                        'per_page' => 10,
                        'previous_page' => 1,
                        'next_page' => 3,
                        'last_page' => 5,
                        'total_entries' => 50,
                    ],
                ],
            ]) ?: ''),
        ];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $pagination = $response->pagination();

        $this->assertEquals(2, $pagination['current_page']);
        $this->assertEquals(10, $pagination['per_page']);
        $this->assertEquals(50, $pagination['total']);
        $this->assertEquals(5, $pagination['last_page']);
        $this->assertEquals(11, $pagination['from']); // (2-1) * 10 + 1
        $this->assertEquals(20, $pagination['to']); // min(2 * 10, 50)
        $this->assertTrue($pagination['has_more_pages']);

        $this->assertArrayHasKey('links', $pagination);
        $this->assertArrayHasKey('first', $pagination['links']);
        $this->assertArrayHasKey('last', $pagination['links']);
        $this->assertArrayHasKey('prev', $pagination['links']);
        $this->assertArrayHasKey('next', $pagination['links']);
    }

    /**
     * Test location workflow simulation
     */
    public function test_location_workflow_simulation(): void
    {
        $requests = [];
        $responses = [
            // List locations response
            new Response(200, [], json_encode([
                'locations' => [
                    [
                        'id' => 1,
                        'name' => 'nbg1',
                        'description' => 'Nuremberg DC 1',
                        'country' => 'DE',
                        'city' => 'Nuremberg',
                        'latitude' => 49.4521,
                        'longitude' => 11.0767,
                        'network_zone' => 'eu-central',
                    ],
                ],
                'meta' => [
                    'pagination' => [
                        'page' => 1,
                        'per_page' => 25,
                        'previous_page' => null,
                        'next_page' => null,
                        'last_page' => 1,
                        'total_entries' => 1,
                    ],
                ],
            ]) ?: ''),
            // Retrieve specific location response
            new Response(200, [], json_encode([
                'location' => [
                    'id' => 1,
                    'name' => 'nbg1',
                    'description' => 'Nuremberg DC 1',
                    'country' => 'DE',
                    'city' => 'Nuremberg',
                    'latitude' => 49.4521,
                    'longitude' => 11.0767,
                    'network_zone' => 'eu-central',
                ],
            ]) ?: ''),
        ];
        $client = $this->fakeClient($responses, $requests);

        // Simulate a workflow: list locations, then get details of the first one
        $listResponse = $client->locations()->list();
        $this->assertInstanceOf(ListResponse::class, $listResponse);
        $this->assertCount(1, $listResponse->locations());

        $firstLocation = $listResponse->locations()[0];
        $locationId = $firstLocation->name();

        $retrieveResponse = $client->locations()->retrieve($locationId);
        $this->assertInstanceOf(RetrieveResponse::class, $retrieveResponse);
        $this->assertEquals($firstLocation->id(), $retrieveResponse->location()->id());
        $this->assertEquals($firstLocation->name(), $retrieveResponse->location()->name());

        // Verify both requests were made
        $this->assertRequestWasMade($requests, 'locations', 'list');
        $this->assertRequestWasMade($requests, 'locations', 'retrieve');
    }

    /**
     * Test location error response handling
     */
    public function test_location_error_response_handling(): void
    {
        $requests = [];
        $responses = [
            new RequestException('Location not found', new Request('GET', '/locations/nonexistent')),
        ];
        $client = $this->fakeClient($responses, $requests);

        $this->expectException(RequestException::class);
        $this->expectExceptionMessage('Location not found');
        $client->locations()->retrieve('nonexistent');
    }

    /**
     * Test location empty list response
     */
    public function test_location_empty_list_response(): void
    {
        $requests = [];
        $responses = [
            new Response(200, [], json_encode([
                'locations' => [],
                'meta' => [
                    'pagination' => [
                        'page' => 1,
                        'per_page' => 25,
                        'previous_page' => null,
                        'next_page' => null,
                        'last_page' => 1,
                        'total_entries' => 0,
                    ],
                ],
            ]) ?: ''),
        ];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();

        $this->assertInstanceOf(ListResponse::class, $response);
        $this->assertCount(0, $response->locations());
        $this->assertEmpty($response->locations());

        $pagination = $response->pagination();
        $this->assertEquals(0, $pagination['total']);
        $this->assertEquals(0, $pagination['to']);
    }

    /**
     * Test location geographic validation
     */
    public function test_location_geographic_validation(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $locations = $response->locations();

        foreach ($locations as $location) {
            // Test that coordinates are valid
            $this->assertGreaterThanOrEqual(-90, $location->latitude());
            $this->assertLessThanOrEqual(90, $location->latitude());
            $this->assertGreaterThanOrEqual(-180, $location->longitude());
            $this->assertLessThanOrEqual(180, $location->longitude());

            // Test that country codes are valid format
            $this->assertMatchesRegularExpression('/^[A-Z]{2}$/', $location->country());

            // Test that network zones are valid
            $this->assertContains($location->networkZone(), ['eu-central', 'eu-west', 'us-east', 'us-west']);

            // Test that names follow expected pattern
            $this->assertMatchesRegularExpression('/^[a-z]{3,4}\d*$/', $location->name());

            // Test that descriptions are not empty
            $this->assertNotEmpty($location->description());
        }
    }

    /**
     * Test location network zone distribution
     */
    public function test_location_network_zone_distribution(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $locations = $response->locations();

        $networkZones = array_map(fn ($location) => $location->networkZone(), $locations);
        $uniqueZones = array_unique($networkZones);

        // Test that we have multiple network zones
        $this->assertGreaterThan(1, count($uniqueZones));

        // Test specific network zones
        $this->assertContains('eu-central', $uniqueZones);
        $this->assertContains('us-east', $uniqueZones);
        $this->assertContains('us-west', $uniqueZones);

        // Test that European locations are in eu-central
        $europeanLocations = array_filter($locations, fn ($location) => in_array($location->country(), ['DE', 'FI']));
        foreach ($europeanLocations as $location) {
            $this->assertEquals('eu-central', $location->networkZone());
        }

        // Test that US locations are in us-east or us-west
        $usLocations = array_filter($locations, fn ($location) => $location->country() === 'US');
        foreach ($usLocations as $location) {
            $this->assertContains($location->networkZone(), ['us-east', 'us-west']);
        }
    }

    /**
     * Test location coordinate accuracy
     */
    public function test_location_coordinate_accuracy(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $locations = $response->locations();

        foreach ($locations as $location) {
            // Test that coordinates have reasonable precision (4 decimal places)
            $latitudeStr = (string) $location->latitude();
            $longitudeStr = (string) $location->longitude();

            $this->assertLessThanOrEqual(4, strlen(substr($latitudeStr, strpos($latitudeStr, '.') + 1)));
            $this->assertLessThanOrEqual(4, strlen(substr($longitudeStr, strpos($longitudeStr, '.') + 1)));

            // Test that coordinates are within expected ranges for each country
            switch ($location->country()) {
                case 'DE':
                    $this->assertGreaterThanOrEqual(47, $location->latitude());
                    $this->assertLessThanOrEqual(55, $location->latitude());
                    $this->assertGreaterThanOrEqual(5, $location->longitude());
                    $this->assertLessThanOrEqual(15, $location->longitude());
                    break;
                case 'FI':
                    $this->assertGreaterThanOrEqual(59, $location->latitude());
                    $this->assertLessThanOrEqual(70, $location->latitude());
                    $this->assertGreaterThanOrEqual(19, $location->longitude());
                    $this->assertLessThanOrEqual(31, $location->longitude());
                    break;
                case 'US':
                    $this->assertGreaterThanOrEqual(25, $location->latitude());
                    $this->assertLessThanOrEqual(49, $location->latitude());
                    $this->assertGreaterThanOrEqual(-125, $location->longitude());
                    $this->assertLessThanOrEqual(-66, $location->longitude());
                    break;
            }
        }
    }

    /**
     * Test location name consistency
     */
    public function test_location_name_consistency(): void
    {
        $requests = [];
        $responses = [];
        $client = $this->fakeClient($responses, $requests);

        $response = $client->locations()->list();
        $locations = $response->locations();

        $names = array_map(fn ($location) => $location->name(), $locations);
        $uniqueNames = array_unique($names);

        // Test that all names are unique
        $this->assertEquals(count($names), count($uniqueNames));

        // Test that names follow expected patterns
        foreach ($names as $name) {
            $this->assertMatchesRegularExpression('/^[a-z]{3,4}\d*$/', $name);
            $this->assertGreaterThanOrEqual(3, strlen($name));
            $this->assertLessThanOrEqual(5, strlen($name));
        }

        // Test specific known location names
        $this->assertContains('nbg1', $names);
        $this->assertContains('fsn1', $names);
        $this->assertContains('hel1', $names);
        $this->assertContains('ash', $names);
        $this->assertContains('hil', $names);
    }
}
