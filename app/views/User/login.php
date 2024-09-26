<?php if (!empty($errors)): ?>
  <div class="alert alert-danger" role="alert"><?=$errors?></div>
<?php endif; ?>
<?php if (!empty($success)): ?>
  <div class="alert alert-success" role="alert"><?=$success?></div>
<?php endif; ?>
<form action="/user/login" method="POST">
  <div class="mb-3">
    <label for="Login" class="form-label">Login</label>
    <input type="text" class="form-control" id="Login" name="login">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="text" class="form-control" id="Password" name="password">
  </div>
  <button class="btn btn-outline-primary" name="btn">Submit</button>
</form>