<?php

declare(strict_types=1);

namespace Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Inline;

use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;

final class StrongRenderer implements NodeRendererInterface
{
    /**
     * @param Strong $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Strong::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $attrs['class'] = "font-bold";

        return new HtmlElement('strong', $attrs, $childRenderer->renderNodes($node->children()));
    }
}
