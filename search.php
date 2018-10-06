<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      if(isset($_GET['anime'])) { 
        $query = str_replace(' ', '%20', htmlspecialchars($_GET['anime']));
        $json = json_decode(file_get_contents('https://kitsu.io/api/edge/anime?filter[text]='.$query), true);
        $data = $json['data'][0]['attributes'];?>
    <meta property="og:image" content="<?php echo $data['posterImage']['small']?>"/>
    <meta property="og:url" content="https://animanga.cf/search?anime=<?php echo $data['canonicalTitle'];?>"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($data['canonicalTitle']);?>"/>
    <meta property="og:description" content="<?php echo  htmlspecialchars($data['synopsis']);?>"/>
    <title>Search | <?php echo $data['canonicalTitle'];?></title>
    <?php } 
      if(isset($_GET['manga'])) { 
        $query = str_replace(' ', '%20', htmlspecialchars($_GET['manga']));
        $json = json_decode(file_get_contents('https://kitsu.io/api/edge/manga?filter[text]='.$query), true);
        $data = $json['data'][0]['attributes'];?>
    <meta property="og:image" content="<?php echo $data['posterImage']['small']?>"/>
    <meta property="og:url" content="https://animanga.cf/search?manga=<?php echo $data['canonicalTitle'];?>"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($data['canonicalTitle']);?>"/>
    <meta property="og:description" content="<?php echo  htmlspecialchars($data['synopsis']);?>"/>
    <title>Search | <?php echo $data['canonicalTitle'];?></title>
    <?php } ?>
    <meta property="og:site_name" content="Animanga.CF" />
    <meta property="og:image" content="https://animanga.cf/assets/img/icon.png"/>
    <meta property="og:url" content="https://animanga.cf/search"/>
    <meta property="og:title" content="Search | Animanga"/>
    <meta property="og:description" content="Welcome to Animanga. Anime and Manga lookup made easy."/>
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="assets/img/icon.png"type="image/x-icon"/>
    <meta name="theme-color" content="#b7d5df">
    <title>Search | Animanga</title>
    <!-- CSS & JS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body class="background">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="./">Animanga</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="search"><div class="active">Search</div></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="trending">Trending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="genres">Genres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://status.oblivionsan.tk" target="_blank">Status</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- end of nav -->
    <main>
      <div class="jumbotron jumbotron-fluid">
        <div class="main-display">
          <h1 class="display-4">Search - サーチ</h1>
          <p class="lead">Anime and Manga lookup made easy.</p>
        </div>
          <hr class="my-4">
          <form method="get">
            <div class="input-group mb-3 container">
              <input type="text" class="form-control" placeholder="Anime Search" name="anime" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary fas fa-search" type="submit"></button>
              </div>
            </div>
          </form>
          <form method="get">
            <div class="input-group mb-3 container">
              <input type="text" class="form-control" placeholder="Manga Search" name="manga" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary fas fa-search" type="submit"></button>
              </div>
          </form>
          </main>
              <?php
              error_reporting(0);
              if(isset($_GET['anime']))
              {
                  $query = str_replace(' ', '%20', htmlspecialchars($_GET['anime']));
                  $json = json_decode(file_get_contents('https://kitsu.io/api/edge/anime?filter[text]='.$query), true);
                  $data = $json['data'][0]['attributes'];?>
            <div class="container">
              <div class="card">
                <div class="card-header"><b><?php echo $data['canonicalTitle'];?></b> | <?php echo $data['titles']['ja_jp'];?> [<?php echo $json['data'][0]['id'];?>]</div>
                <div class="card-body">
                  <div class="media">
                    <img style="border-radius: 3px;" class="mr-3" src="<?php echo $data['posterImage']['small']?>">
                    <div class="media-body">
                      <h5 class="mt-0"></h5>
                      <table class="table table-sm">
                        <tbody>
                          <tr><div class="canon-title"><b>English Title</b>: <?php echo $data['titles']['en'];?></div></tr>
                          <tr>
                            <td>
                              <b>Type</b>: <?php echo ucfirst($json['data'][0]['type']);?> [<?php echo ucfirst($data['subtype']);?>]<br>
                              <b>Score</b>: <?php echo $data['averageRating'];?><br>
                              <b>Rating</b>: <?php echo $data['ageRating'];?> - <?php echo $data['ageRatingGuide'];?><br>
                              <b>Status</b>: <?php echo ucfirst($data['status']);?><br>
                              <b>Aired</b>: <?php echo $data['startDate'];?> to <?php echo $data['endDate'];?><br>
                              <b>Episodes</b>: <?php echo ucfirst($data['episodeCount']);?> | <b>Length</b>: <?php echo ucfirst($data['episodeLength']);?> Minutes<br>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <button class="accordion text-center"><b>Click for Synopsis</b></button>
                              <div class="panel"><?php echo $data['synopsis'];?></div>
                            </td>
                          </tr>
                          <tr>
                            <td><div class="box-yt text-center" style="background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo $data['coverImage']['original'];?>);"><a class="button-yt" target="_blank" href="https://www.youtube.com/watch?v=<?php echo $data['youtubeVideoId'];?>"><i class="fab fa-youtube"></i></a></div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div style="padding-top: 20px;" class="container">
                <h4>Related</h4>
                <?php foreach($json['data'] as $data) { 
                $dataAtt = $data['attributes'];?>
                <a title="<?php echo $dataAtt['canonicalTitle'];?>" href="./search?anime=<?php echo $dataAtt['canonicalTitle']; ?>"><img class="related-images" src="<?php echo $dataAtt['posterImage']['small']?>"></a>
                <?php } ?>
              </div>
            </div>
            <?php }
              error_reporting(0);
              if(isset($_GET['manga']))
              {
                  $query = str_replace(' ', '%20', htmlspecialchars($_GET['manga']));
                  $json = json_decode(file_get_contents('https://kitsu.io/api/edge/manga?filter[text]='.$query), true);
                  $data = $json['data'][0]['attributes'];?>
            <div class="container">
              <div class="card">
                <div class="card-header"><b><?php echo $data['canonicalTitle'];?></b> | <?php echo $data['titles']['ja_jp'];?> [<?php echo $json['data'][0]['id'];?>]</div>
                <div class="card-body">
                  <div class="media">
                    <img style="border-radius: 3px;" class="mr-3" src="<?php echo $data['posterImage']['small']?>">
                    <div class="media-body">
                      <h5 class="mt-0"></h5>
                      <table class="table table-sm">
                        <tbody>
                          <tr><div class="canon-title"><b>English Title</b>: <?php echo $data['titles']['en'];?></div></tr>
                          <tr>
                            <td>
                              <b>Type</b>: <?php echo ucfirst($json['data'][0]['type']);?> [<?php echo ucfirst($data['subtype']);?>]<br>
                              <b>Score</b>: <?php echo $data['averageRating'];?><br>
                              <b>Rating</b>: <?php echo $data['ageRating'];?> - <?php echo $data['ageRatingGuide'];?><br>
                              <b>Status</b>: <?php echo ucfirst($data['status']);?><br>
                              <b>Serialization</b>: <?php echo $data['serialization'];?><br>
                              <b>Chapters</b>: <?php echo $data['chapterCount'];?> | <b>Volumes</b>: <?php echo $data['volumeCount'];?><br>
                              <b>Aired</b>: <?php echo $data['startDate'];?> to <?php echo $data['endDate'];?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <button class="accordion text-center"><b>Click for Synopsis</b></button>
                              <div class="panel"><?php echo $data['synopsis'];?></div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <h4>Related</h4>
                <?php foreach($json['data'] as $data) { 
                $dataAtt = $data['attributes'];?>
                <a title="<?php echo $dataAtt['canonicalTitle'];?>" href="./search?manga=<?php echo $dataAtt['canonicalTitle']; ?>"><img class="related-images" src="<?php echo $dataAtt['posterImage']['small']?>"></a>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    <!-- end of main -->
    <footer class="footer text-center fixed-bottom">
      <a target="_blank" style="padding-right:5px;" href="https://discord.oblivionsan.tk"><i class="fab fa-discord"></i></a><a target="_blank" style="padding-right:5px;" href="https://twitter.com/OblivionSan"><i class="fab fa-twitter"></i></a><a target="_blank" style="padding-right:5px;" href="https://github.com/OblivionSan"><i class="fab fa-github"></i></a><a href="https://oblivionsan.tk" title="Developed by Oblivion さん"><i class="fas fa-heart"></i></a>
    </footer>
    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;
      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight){
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
    </script>
  </body>
</html>