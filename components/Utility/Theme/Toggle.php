<?php

namespace Components\Utility\Theme;

use Components\Component;

/**
 * Theme toggle component
 */
class Toggle extends Component
{
    public string $body;
    public function __construct()
    {
        $this->body = <<<HTML
                <input type="checkbox" id="theme-toggle" class="theme-toggle" />
                <label title="Temayı Değiştir" for="theme-toggle"></label>
        HTML;
    }
}
