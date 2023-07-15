<?php

declare(strict_types=1);

namespace Yii\Assets;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * Production asset bundle for the MarkDownEditor widget.
 */
final class MarkDownEditor extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@easymde-asset/src';
    public array $css = ['css/easymde.css'];
    public array $js = ['js/easymde.js'];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = ['filter' => $pathMatcher->only('**/easymde.css', '**/easymde.js')];
    }
}
