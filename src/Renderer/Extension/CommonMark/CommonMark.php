<?php

namespace Marvinosswald\Tailmark\Renderer\Extension\CommonMark;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use League\CommonMark\Extension\ExtensionInterface;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Block\HeadingRenderer;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Block\ListBlockRenderer;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Block\ListItemRenderer;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Inline\LinkRenderer;
use Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Inline\StrongRenderer;

final class CommonMark implements ExtensionInterface
{
    private int $overridePriority = 1;

    public function register(EnvironmentBuilderInterface $environment): void
    {
        // Block
        $environment->addRenderer(Heading::class, new HeadingRenderer(), $this->overridePriority);
        $environment->addRenderer(ListBlock::class, new ListBlockRenderer(), $this->overridePriority);
        $environment->addRenderer(ListItem::class, new ListItemRenderer(), $this->overridePriority);

        // Inline
        $environment->addRenderer(Strong::class, new StrongRenderer(), $this->overridePriority);
        $environment->addRenderer(Link::class, new LinkRenderer(), $this->overridePriority);
    }
}
