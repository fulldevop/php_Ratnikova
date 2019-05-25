<div class="top-menu">
  <div class="auth">
    <? if(!$auth): ?>
    <a id="login">Войти</a>
    <? else: ?>
    <span class="welcome">, добро пожаловать на сайт</span>
    <a href="?logout" id="logout">Выход</a>
    <? endif; ?>
  </div>
</div>
<div class="menu">
  <div class="container">
    <ul>
      <li>
        <a href="/">
          <img class="logo-img" src="./img/logo.svg" alt="logo">
        </a>
      </li>
      <li>
        <a href="/?c=basket">
          <img class="cart-icon" src="./img/cart-white.svg" alt="cart-icon">
        </a>
      </li>
    </ul>
  </div>
</div>