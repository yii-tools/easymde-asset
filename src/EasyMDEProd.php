<?php

declare(strict_types=1);

namespace Yii\Assets;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * Production asset bundle for the EasyMDE widget.
 */
final class EasyMDEProd extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@easymde-asset';
    public array $css = ['dist/easymde.min.css'];
    public array $js = ['dist/easymde.min.js'];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = ['filter' => $pathMatcher->only('**/easymde.min.css', '**/easymde.min.js')];
    }
}
