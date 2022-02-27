<?php

declare(strict_types=1);

namespace Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Block;

use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

final class HeadingRenderer implements NodeRendererInterface
{
    private array $settings = [
        1 => "block text-3xl font-extrabold tracking-tight sm:text-4xl",
        2 => "block text-3xl font-bold tracking-tight sm:text-4xl",
        3 => "block text-3xl tracking-tight sm:text-4xl",
    ];
    /**
     * @param Heading $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Heading::assertInstanceOf($node);

        $tag = 'span';

        $attrs = $node->data->get('attributes');
        if (key_exists("class", $attrs)) {
            $attrs['class'] = $attrs['class'] . " " . $this->getSetting($node->getLevel());
        } else {
            $attrs['class'] = $this->getSetting($node->getLevel());
        }

        return new HtmlElement($tag, $attrs, $childRenderer->renderNodes($node->children()));
    }

    private function getSetting($level): string
    {
        return config("tailmark.h." . $level, key_exists($level, $this->settings) ? $this->settings[$level] : $this->settings[1]);
    }
}
