<?php

namespace Marvinosswald\Tailmark;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\CommonMark;
use Marvinosswald\Tailmark\Renderer\Extension\Strikethrough\Strikethrough as StrikethroughTailmark;

class Tailmark
{
    public static function getEnvironment(): Environment
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new CommonMark());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new StrikethroughTailmark());

        return $environment;
    }
}
// Class "Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Renderer\Block\HeadingRenderer" not found
