<?php
define('FILE_ACCESS', TRUE);

require_once("{$_SERVER['DOCUMENT_ROOT']}/vendor/autoload.php");
require_once("{$_SERVER['DOCUMENT_ROOT']}/config/functions.inc.php");

// Built-in components
use Components\Super\Head;
use Components\Super\Legs;

// Custom Components
use Components\Layout\Navbar;
use Components\Layout\Footer;
use Components\Note;
use Components\Notification;
use Components\CreateNote;
use Components\ReadNote;

new Head();
new Navbar();

$names = [
    "Eren Aydın",
    "Enes Çakır",
    "Gürsel Şanlı",
    "Duygu Şeker",
    "Çağatay Gedik",
    "Şahnoza",
    "İrem Damla Kakız",
    "Dozer",
    "Zerda Yıldırım",
    "Burak Karadaş",
    "Melisa Erol",
    "Burak Cosgun",
    "Derya Günel",
    "Tuba Miray",
    "Taha Binarbaşı",
    "Yaşar Can Göksel",
    "Memos",
];

new Notification();
new CreateNote();
new ReadNote();
?>

<section id="landing-page">
    <div class="welcome">
        <div class="content">
            <div class="heading">
                <h1 class="countdown dynamic-content">
                    <span class="days"></span>
                    :
                    <span class="hours"></span>
                    :
                    <span class="minutes"></span>
                    :
                    <span class="seconds"></span>
                </h1>
                <h5 id="small-welcome-text">Dünya 24 saatliğine güzel olmak üzere...</h5>
            </div>
            <div class="btns">
                <button id="see-notes" onclick="window.location.href='#notes'" class="secondary">Diğer notlara bak</button>
                <button id="create-note" class="primary">Bir not bırak</button>
            </div>
        </div>
    </div>
</section>
<section id="moments">
    <h2>Epik Efe Anları</h2>
    <div class="moments-card">
        <div class="moments-content">
            <h3 class="title">🌟 Hayat Başlıyor</h3>
            <p class="desc">
                12 Şubat 2004 tarihinde dünyaya gelen <span style="color:var(--secondary);">Kaan Efe Karadaş</span>, gelir gelmez kendini belli etti. Zira söylentilere göre, o gün gezegenin belli noktalarında fırtınalar kopmuş, depremler meydana gelmiş ve yangınlar çıkmıştır.
            </p>
        </div>
        <div class="moments-image">
            <img src="/public/imgs/power.png">
        </div>
    </div>
    <div class="moments-card">
        <div class="moments-content">
            <h3 class="title">"Pistol Tim Begins" 🔫</h3>
            <p class="desc">
                Büyüdükçe güçlerini kontrol altına almayı başardı ve <span style="color:var(--secondary);">Pistol Tim</span> adında bir grup kurdu. O günden beri, dünyayı dış tehditlere karşı korumaktadırlar.
            </p>
        </div>
        <div class="moments-image">
            <img src="/public/imgs/hero.png">
        </div>
    </div>
    <div class="moments-card">
        <div class="moments-content">
            <h3 class="title">🕵🏻 İstihbarat Teşkilatı</h3>
            <p class="desc">
                2024 yılında, arkadaşlarıyla birlikte Pistol Tim'e bağlı bir istihbarat ağı kurdu; <span style="color:var(--secondary);">Pistol Tim İstihbarat Teşkilatı</span>. Diğer kurucu üyelerin isimleri gizlilik sebebiyle açıklanmamıştır.
            </p>
        </div>
        <div class="moments-image">
            <img src="/public/imgs/spy.png">
        </div>
    </div>
</section>

<section id="notes">
    <h2>Notlar</h2>
    <div class="notes-container">
        <?php
        $notes = getNotes()[1]; // notes array from the database
        shuffle($notes);
        foreach ($notes as $n) {
            new Note($n['id'], $n['author']);
        }
        ?>
    </div>
</section>
<?php
new Footer();
new Legs();
?>