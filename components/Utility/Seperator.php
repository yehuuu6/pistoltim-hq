<?php

namespace Components\Utility;

use Components\Component;

/**
 * Line seperator component
 */
class Seperator extends Component
{
    public string $body;
    public function __construct()
    {
        $this->body = <<<HTML
                <div style="width: 100%;height: 1px;background-color: var(--text);opacity: 10%;margin-top: 1em;"></div>
        HTML;
    }
}
