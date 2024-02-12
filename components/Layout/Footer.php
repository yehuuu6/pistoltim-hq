<?php

namespace Components\Layout;

use Components\Component;
use Components\Utility\Seperator;

/**
 * Footer component
 */
class Footer extends Component
{
    public function __construct()
    {
        $body = <<<HTML
                <footer>
                    <h4>Sıkça Sorulan Sorular</h4>
                    <div id="faq" class="faq">
                        <div class="faq-group">
                            <div class="faq-item">
                                <h5>Ne bu?</h5>
                                <p>- Efe dostumuzun doğum gününe özel internetin bu köşesini ele geçirdik.</p>
                            </div>
                            <div class="faq-item">
                                <h5>Notlar nasıl çalışıyor?</h5>
                                <p>- Notlar doğum gününe kadar gizli tutulacaktır. Daha sonra ise herkese açık bir şekilde yayınlanacaktır.</p>
                            </div>
                        </div>
                        <div class="faq-group">
                            <div class="faq-item">
                                <h5>Doğum günü ne zaman?</h5>
                                <p>- Yukarıdaki sayaçtan takip edebilirsin. Üşendiysen de söyleyeyim, 12 Şubat 2024.</p>
                            </div>
                            <div class="faq-item">
                                <h5>Siteyi Efe'ye gösterebilir miyim?</h5>
                                <p>- Kesinlikle <strong>HAYIR!</strong> doğum gününe kadar notlar biriktirilecek ve sürpriz olacak.</p>
                            </div>
                        </div>
                        <div class="faq-group">
                            <div class="faq-item">
                                <h5>Yazılanlar hakkında...</h5>
                                <p>- "Epik Efe Anları" alanında yazılan çoğu şey hayal ürünü olup, gerçek ile alakası yoktur... Yoksa var mı?</p> 
                            </div>
                        </div>
                    </div>
                    {$this->renderSeperator()}
                    <div class="copyright">
                    <div>
                            <p>Bu websitesi <span style="color:var(--secondary);">13 Şubat 2024</span> tarihinde yok edilecektir.</p>
                            <p>Ziyaret ettiğiniz için teşekkürler.</p>
                        </div>
                        <div class="cool-text">
                            <p>Made with 🧠 & <a style="color:var(--secondary);" href="https://github.com/yehuuu6/ptw-template" target="_blank">PTW</a> by <a href="https://www.instagram.com/therenaydin/" target="_blank">@therenaydin</a></p>
                            <p>Copyright © 2024 All rights reserved.</p>
                        </div>
                    </div>
                </footer>
        HTML;

        // Render the component on the page
        parent::render($body);
    }

    private function renderSeperator()
    {
        $seperator = new Seperator();
        return $seperator->body;
    }
}
