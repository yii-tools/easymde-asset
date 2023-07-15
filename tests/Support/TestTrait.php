<?php

declare(strict_types=1);

namespace Yii\Assets\Tests\Support;

use Exception;
use PHPForge\Support\Assert;
use Psr\Log\NullLogger;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetLoader;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;

trait TestTrait
{
    private Aliases $aliases;
    private AssetManager $assetManager;
    private AssetPublisher $assetPublisher;

    protected function setUp(): void
    {
        $this->aliases = new Aliases(
            [
                '@root' => dirname(__DIR__, 2),
                '@assets' => __DIR__ . '/runtime',
                '@assetsUrl' => '/assets',
                '@easymde-asset' => '@npm/easymde',
                '@npm' => '@root/node_modules',
            ]
        );
        $this->assetManager = $this->createAssetManager($this->aliases);
    }

    /**
     * @throws Exception
     */
    protected function tearDown(): void
    {
        Assert::removeFilesFromDirectory($this->aliases->get('@assets'));

        unset($this->assetManager);
    }

    /**
     * Create AssetManager with AssetConverter and AssetPublisher instances for testing.
     *
     * @param Aliases $aliases The aliases instance.
     *
     * @return AssetManager The AssetManager instance.
     */
    protected function createAssetManager(Aliases $aliases): AssetManager
    {
        $converter = new AssetConverter($aliases, new NullLogger(), [], false);
        $loader = new AssetLoader($aliases, false, [], null, null);

        $this->assetPublisher = new AssetPublisher($aliases, false, false);
        $this->assetPublisher = $this->assetPublisher->withForceCopy(true);

        $manager = new AssetManager($aliases, $loader, [], []);

        return $manager->withConverter($converter)->withPublisher($this->assetPublisher);
    }
}
