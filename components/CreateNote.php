<?php

namespace Components;

use Components\Component;

/**
 * Birthday Note creation container component
 */
class CreateNote extends Component
{
    public function __construct()
    {
        $body = <<<HTML
                <div id="add-note-container" class="add-note-container hide">
                    <form id="add-note">
                        <div class="warning">
                            <div class="warning-icon">
                                <img src="/public/icons/info.png" alt="">
                            </div>
                            <p>Notunuzun bir gün boyunca ziyaret eden herkese açık olacağını unutmayın!</p>
                        </div>
                        <div class="form-group">
                            <input spellcheck="false" type="text" autocomplete="off" name="note-author" id="note-author" placeholder="İsminiz">
                        </div>
                        <div class="form-group">
                            <span id="character-counter">0/350</span>
                            <textarea spellcheck="false" name="note-content" id="note-content" cols="30" rows="10" maxlength="350" placeholder="Efe için bir not yazın"></textarea>
                        </div>
                        <div class="form-group btns">
                            <div class="items" style="gap:0.25rem; font-weight:600;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>
                                <a id="go-faq" title="Sıkça Sorulan Sorular" href="#faq">SSS
                                </a>
                            </div>
                            <div class="items">
                                <button class="cancel">İptal et</button>
                                <button class="primary">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
        HTML;

        // Render the component on the page
        parent::render($body);
    }
}
