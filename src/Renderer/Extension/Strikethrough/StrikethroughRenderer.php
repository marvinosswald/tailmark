<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com> and uAfrica.com (http://uafrica.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Marvinosswald\Tailmark\Renderer\Extension\Strikethrough;

use League\CommonMark\Node\Node;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Extension\Strikethrough\Strikethrough;

final class StrikethroughRenderer implements NodeRendererInterface
{
    /**
     * @param Strikethrough $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Strikethrough::assertInstanceOf($node);

        return new HtmlElement('del', $node->data->get('attributes'), $childRenderer->renderNodes($node->children()));
    }
}
