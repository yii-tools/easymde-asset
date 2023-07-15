<?php

declare(strict_types=1);

namespace Yii\Assets;

use Yiisoft\Assets\AssetBundle;

/**
 * Content delivery network asset bundle for the EasyMDE widget.
 */
final class EasyMDECdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css'];
    public array $js = ['https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js'];
}
