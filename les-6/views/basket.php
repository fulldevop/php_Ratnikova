<?php
/** @var \app\model\Basket $basket */
?>
<div class="bg-top bg-top-basket">
  <div class="container top-contain-bask">
    <div class="head-info-product">
      <h1 class="basket-title">Корзина</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="wrap-products-basket">
    <? if ($basket): ?>
      <? foreach ($basket as $item): ?>
        <div class="basket-block-good" id="cart-good_<?= $item['id'] ?>">
          <div class="bask-img-good">
            <a href="/product/card/?id=<?= $item['id_good']; ?>">
              <img src="./img/products/small/prod-<?= $item['id_good']; ?>.jpg" alt="img-good">
            </a>
          </div>
          <div class="bask-text-good">
            <div class="text">
              <a href="/product/card/?id=<?= $item['id_good']; ?>">
                <?= $item['name']; ?>
              </a>
            </div>
          </div>
          <div class="bask-quantity-price-good">
            <div class="price price-good" id="price-good_<?= $item['id'] ?>"
                 data-price="<?= $item['price']; ?>"><?= $item['price']; ?> &#8381;
            </div>
            <div class="quantity-good">
              <input class="count-input" type="number" min="1" max="10"
                     value="<?= $item['quantity'] ?>" id="count-input_<?= $item['id'] ?>">
            </div>
            <div class="price sum-good"><span class="sum-product" id="sum-good_<?= $item['id'] ?>"></span> &#8381;</div>
          </div>
          <div class="bask-remove-good">
            <a class="delete-good" id="<?= $item['id'] ?>">Удалить</a>
          </div>
        </div>
      <? endforeach; ?>

    <div class="total-sum">Итого: <span id="total-sum"></span><span> &#8381;</span></div>

    <? else: ?>
      <div class="empty-basket">
        <div class="img-empty-cart">
          <img src="./img/cartempty.png" alt="cartempty">
        </div>
        <div class="content">
          <p>К сожалению, ваша корзина пока пуста.<br>
            Но есть отличная возможность её наполнить! Например, начните с <a href="/">главной страницы</a>.<br>
            Далее нажмите на кнопку <i>Купить</i>, и товары появятся здесь!</p>
        </div>
      </div>
    <? endif; ?>
  </div>
</div>