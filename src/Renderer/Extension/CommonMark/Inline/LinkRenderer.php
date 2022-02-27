<?php

declare(strict_types=1);

namespace Marvinosswald\Tailmark\Renderer\Extension\CommonMark\Inline;

use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Util\RegexHelper;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class LinkRenderer implements NodeRendererInterface, ConfigurationAwareInterface
{
    private string $setting = "text-blue-600 hover:underline dark:text-blue-500";
    /** @psalm-readonly-allow-private-mutation */
    private ConfigurationInterface $config;

    /**
     * @param Link $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Link::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $forbidUnsafeLinks = ! $this->config->get('allow_unsafe_links');
        if (! ($forbidUnsafeLinks && RegexHelper::isLinkPotentiallyUnsafe($node->getUrl()))) {
            $attrs['href'] = $node->getUrl();
        }

        if (($title = $node->getTitle()) !== null) {
            $attrs['title'] = $title;
        }

        if (isset($attrs['target']) && $attrs['target'] === '_blank' && ! isset($attrs['rel'])) {
            $attrs['rel'] = 'noopener noreferrer';
        }

        if (key_exists("class", $attrs)) {
            $attrs['class'] = $attrs['class'] . " " . $this->getSetting();
        } else {
            $attrs['class'] = $this->getSetting();
        }

        return new HtmlElement('a', $attrs, $childRenderer->renderNodes($node->children()));
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    private function getSetting(): string
    {
        return config("tailmark.a.", $this->setting);
    }
}
