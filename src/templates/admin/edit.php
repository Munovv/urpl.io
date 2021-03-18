<div id="edit-form" class="glass text-center">
  <h2 style="padding-top:10px;">Edit url #<?=$this->route['id'];?></h2>
  <span>
    <a href="/dashboard" style="color: #fff;"><strong>Return to dashboard</strong></a>
  </span>
  <form action="/edit/<?=$this->route['id'];?>" method="post" id="edit">
    <div class="row">
      <div class="col-md-12 mt-3">
        <input autocomplete="off" class="nice-input" type="text" name="url" placeholder="Url..." value="<?=$url_data['url'];?>">
      </div>
      <div class="col-md-12 mt-3">
        <input autocomplete="off" class="nice-input" type="text" name="short_code" placeholder="Short code..." value="<?=$url_data['short_code'];?>">
      </div>
      <div class="col-md-12 mt-3">
        <button class="btn btn-primary" type="submit" id="edit-button">Sign in</button>
      </div>
    </div>
  </form>
</div>
