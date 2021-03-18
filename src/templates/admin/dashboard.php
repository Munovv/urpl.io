<div class="row justify-content-md-center">

  <div class="col-md-4 col-md-offset-0">
      <div class="title"><h2>Logout</h2></div>
        <div class="menu-box glass" id="logout-button">
          <i class="zmdi zmdi-power zmdi-hc-4x"></i>
        </div>
  </div>

  <div class="col-md-4 col-md-offset-0">
      <div class="title"><h2>All url's</h2></div>
      <div class="menu-box glass" id="url-button">
        <i class="zmdi zmdi-apps zmdi-hc-4x"></i>
      </div>
  </div>

  <div class="col-md-4 col-md-offset-0">
      <div class="title"><h2>Github</h2></div>
      <div class="menu-box glass" id="github-button" onclick="javascript:document.location.href='https://github.com/Munovv'">
        <i class="zmdi zmdi-github zmdi-hc-4x"></i>
      </div>
  </div>

</div>

<div id="url-table" class="glass text-center">
  <h2 style="padding-top:10px;">All url's</h2>
  <span class="close-btn">
    <i class="zmdi zmdi-close zmdi-hc-2x"></i>
  </span>
  <div class="table-card">
    <table class="uk-table uk-table-hover uk-table-striped" id="main-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>URL</th>
          <th>Short code</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($urls)):
              foreach ($urls as $url):
        ?>
        <tr>
          <td><?=$url['id'];?></td>
          <td><?=substr($url['url'], 0, 15); if (strlen($url['url']) > 15){ echo '...';}?></td>
          <td><?=$url['short_code'];?></td>
          <td><?=$url['date_time'];?></td>
          <td>
            <a href="/edit/<?=$url['id'];?>" target="_blank" style="color: #fff;"><i class="zmdi zmdi-edit"></i></a>
            <a href="/delete/<?=$url['id'];?>" target="_blank" style="color: #fff; padding-left: 16px;"><i class="zmdi zmdi-delete"></i></a>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
