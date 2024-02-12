<?php

namespace Components;

use Components\Component;
use Components\Utility\Loader;

/**
 * Birthday Note reader component
 */
class ReadNote extends Component
{
    public function __construct()
    {
        $body = <<<HTML
                <div id="read-note-container" class="add-note-container hide">
                    <div class="read-note">
                        {$this->showLoader()}
                    </div>
                </div>
        HTML;

        // Render the component on the page
        parent::render($body);
    }

    public function showLoader()
    {
        $a = new Loader();
        return $a->body;
    }
}
