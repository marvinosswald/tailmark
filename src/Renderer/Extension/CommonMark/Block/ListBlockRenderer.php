<?php

declare(strict_types=1);

namespace Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Block;

use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

final class ListBlockRenderer implements NodeRendererInterface
{
    /**
     * @param ListBlock $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        ListBlock::assertInstanceOf($node);

        $listData = $node->getListData();

        $tag = $listData->type === ListBlock::TYPE_BULLET ? 'ul' : 'ol';

        $attrs = $node->data->get('attributes');
        $attrs['class'] = ListBlock::TYPE_BULLET ? 'list-disc' : 'list-decimal';

        if ($listData->start !== null && $listData->start !== 1) {
            $attrs['start'] = (string) $listData->start;
        }

        $innerSeparator = $childRenderer->getInnerSeparator();

        return new HtmlElement($tag, $attrs, $innerSeparator . $childRenderer->renderNodes($node->children()) . $innerSeparator);
    }
}
