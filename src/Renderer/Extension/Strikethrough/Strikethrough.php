<?php
namespace Marvinosswald\Tailmark\Renderer\Extension\Strikethrough;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\Strikethrough\Strikethrough as StrikethroughElement;

final class Strikethrough implements ExtensionInterface
{
    private int $overridePriority = 1;
    public function register(EnvironmentBuilderInterface $environment): void
    {
        // Block
        $environment->addRenderer(StrikethroughElement::class, new StrikethroughRenderer(), $this->overridePriority);
    }
}
