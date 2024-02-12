<?php

namespace Components\Layout;

use Components\Component;

use Components\Utility\Theme\Toggle;

/**
 * Navbar component
 */
class Navbar extends Component
{
    public function __construct()
    {
        $body = <<<HTML
                <nav>
                    <div onclick="window.location.href='/'" class="left">
                        <img class="logo" src="/public/favicon.png" alt="">
                        <h5 class="logo-text">Pistol Tim</h5>
                    </div>
                    <div class="right">
                        {$this->renderThemeToggle()}
                    </div>
                </nav>
        HTML;

        // Render the component on the page
        parent::render($body);
    }

    private function renderThemeToggle()
    {
        $toggle = new Toggle();
        return $toggle->body;
    }
}
