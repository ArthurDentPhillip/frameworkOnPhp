<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-bottom:3% !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Products</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <?php if (!empty($_SESSION['reg'])): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://site1.local">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://site1.local/post/goods#">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://site1.local/cart/show">Cart</a>
        </li>
        <?php endif; ?>
        <?php if (!empty($_SESSION['admin'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="http://site1.local/admin/show">Admin</a>
        </li>
        <?php endif; ?>
        <?php if (empty($_SESSION['reg'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/user/signup">Signup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/login">Login</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="/user/login">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>