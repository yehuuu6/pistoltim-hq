<?php

namespace Components;

use Components\Component;

/**
 * Birthday Note Card component
 */
class Note extends Component
{
    protected $id;
    protected $name;
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $body = <<<HTML
                <div data-id="{$this->id}" class="note{$this->setNoteType()}" style="{$this->setRandomColor()}">
                    {$this->name}
                </div>
        HTML;

        // Render the component on the page
        parent::render($body);
    }

    private function setNoteType()
    {
        $validTypes = [
            "",
            " tall",
            " wide"
        ];

        // Select random type
        $type = $validTypes[rand(0, count($validTypes) - 1)];

        return $type;
    }

    private function setRandomColor()
    {
        $colors = [
            "background-color: hsl(221, 100%, 50%, 5%);",
            "background-color: hsl(144, 100%, 50%, 5%);",
            "background-color: hsl(265, 100%, 55%, 5%);",
        ];

        // Select random color
        $color = $colors[rand(0, count($colors) - 1)];

        return $color;
    }
}
