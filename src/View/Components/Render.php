<?php

namespace Marvinosswald\Tailmark\View\Components;

use Illuminate\View\Component;
use League\CommonMark\MarkdownConverter;
use Marvinosswald\Tailmark\Tailmark;

class Render extends Component
{
    public string $markdown;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $markdown)
    {
        $this->markdown = $markdown;
        // Instantiate the converter engine and start converting some Markdown!
        $converter = new MarkdownConverter(Tailmark::getEnvironment());
        $this->html = $converter->convert($this->markdown);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('tailmark::components.render')->with('html', $this->html);
    }
}
