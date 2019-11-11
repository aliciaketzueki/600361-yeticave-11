<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
    <?php foreach($categories as $key => $val): ?>
        <li class="promo__item promo__item--<?= $val["code"]?>">
            <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($val["name"]) ?></a>
        </li>
    <? endforeach; ?>
    </ul>
    </section>
    <section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach($lots as $key => $val): ?>
        <li class="lots__item lot">
        <div class="lot__image">
            <img src="<?= htmlspecialchars($val["image"]) ?>" width="350" height="260" alt="<?= htmlspecialchars($val["title"]) ?>">
        </div>
        <div class="lot__info">
            <span class="lot__category"><?= htmlspecialchars($val["name"]) ?></span>
            <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($val["title"]) ?></a></h3>
            <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= htmlspecialchars(format_price($val["start_cost"])) ?></span>
            </div>
        <div class="lot__timer timer <?php if (calc_time($val["finish_date"])[0] < 1) : ?> timer--finishing <? endif; ?>">
                <?= htmlspecialchars(implode(":", calc_time($val["finish_date"]))); ?>
            </div>
            </div>
        </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
