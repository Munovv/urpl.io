<div class="row justify-content-md-center">

  <div class="col-md-4 col-md-offset-0" <?php if (!empty($_SESSION['admin'])) { echo 'style="display: none;"';}?>>
      <div class="title"><h2>Sign In</h2></div>
      <div class="menu-box glass" id="login-button">
        <i class="zmdi zmdi-account-o zmdi-hc-4x"></i>
      </div>
  </div>

  <div class="col-md-4 col-md-offset-0" <?php if (empty($_SESSION['admin'])) { echo 'style="display: none;"';}?>>
      <div class="title"><h2>Admin</h2></div>
      <div class="menu-box glass" id="admin-button">
        <i class="zmdi zmdi-account-o zmdi-hc-4x"></i>
      </div>
  </div>

  <div class="col-md-4 col-md-offset-0">
      <div class="title"><h2>SHORT</h2></div>
      <div class="menu-box glass" id="url-button">
        <i class="zmdi zmdi-link zmdi-hc-4x"></i>
      </div>
  </div>

  <div class="col-md-4 col-md-offset-0">
      <div class="title"><h2>Github</h2></div>
      <div class="menu-box glass" id="github-button" onclick="javascript:document.location.href='https://github.com/Munovv'">
        <i class="zmdi zmdi-github zmdi-hc-4x"></i>
      </div>
  </div>

</div>

<div id="login-form" class="glass">
  <h2 style="padding-top:50px;">Sign In</h2>
  <span class="close-btn">
    <i class="zmdi zmdi-close zmdi-hc-2x"></i>
  </span>

  <form id="login-data" method="post" action="/login">
    <div class="row">
      <div class="col-md-12 mt-3">
        <input autocomplete="off" class="nice-input" type="text" name="login" placeholder="Username...">
      </div>
      <div class="col-md-12 mt-3">
        <input autocomplete="off" class="nice-input" type="password" name="password" placeholder="Password...">
      </div>
      <div class="col-md-12 mt-3">
        <button class="btn btn-primary" type="submit" id="login-button">Sign in</button>
      </div>
    </div>
  </form>
</div>

<div id="url-form" class="glass">
  <h3 style="padding-top:50px;">Paste the URL to be shortened</h3>
  <span class="close-btn">
    <i class="zmdi zmdi-close zmdi-hc-2x"></i>
  </span>

  <form id="url-data" method="post" action="/shorting">
    <div class="row">
      <div class="col-md-12 mt-3">
        <input autocomplete="off" class="nice-input" type="text" name="url" id="url-input" placeholder="Enter the link here">
      </div>
      <div class="col-md-12 mt-3">
        <button id="short-button" type="submit" class="btn btn-primary">Short</button>
      </div>
      <div class="col-md-12 mt-3">
        <h4 id="url-result">Your shortened link will appear here</h4>
      </div>
    </div>
  </form>
</div>
