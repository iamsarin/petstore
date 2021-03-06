<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceProvider;

use App\ServiceProvider\SerializationServiceProvider;
use Chubbyphp\Serialization\Mapping\CallableNormalizationObjectMapping;
use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Chubbyphp\Mock\MockByCallsTrait;
use Slim\Interfaces\RouterInterface;

/**
 * @covers \App\ServiceProvider\SerializationServiceProvider
 */
final class SerializationServiceProviderTest extends TestCase
{
    use MockByCallsTrait;

    public function testRegister()
    {
        $container = new Container([
            'router' => $this->getMockByCalls(RouterInterface::class),
        ]);

        $serviceProvider = new SerializationServiceProvider();
        $serviceProvider->register($container);

        self::assertArrayHasKey('serializer.mappingConfigs', $container);

        $mappingConfigs = $container['serializer.mappingConfigs'];

        self::assertArrayHasKey('serializer.normalizer.objectmappings', $container);

        $mappings = $container['serializer.normalizer.objectmappings'];

        self::assertCount(3, $mappings);

        self::assertInstanceOf(CallableNormalizationObjectMapping::class, $mappings[0]);
        self::assertInstanceOf(CallableNormalizationObjectMapping::class, $mappings[1]);
        self::assertInstanceOf(CallableNormalizationObjectMapping::class, $mappings[2]);

        self::assertCount(5, $mappings[0]->getNormalizationFieldMappings('path'));
        self::assertCount(3, $mappings[1]->getNormalizationFieldMappings('path'));
        self::assertCount(5, $mappings[2]->getNormalizationFieldMappings('path'));
    }
}
