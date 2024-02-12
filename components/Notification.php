<?php

namespace Components;

use Components\Component;

/**
 * Notification component
 */
class Notification extends Component
{
    public function __construct()
    {
        $body = <<<HTML
                <div class="notification">
                    <div class="badge"></div>
                    <h5 id="message"></h5>
                    <span id="progress-bar"></span>
                </div>
        HTML;

        // Render the component on the page
        parent::render($body);
    }
}
