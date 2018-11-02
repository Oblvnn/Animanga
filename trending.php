<?php
  $animeTrend = json_decode(file_get_contents('https://kitsu.io/api/edge/trending/anime'), true);
  $mangaTrend = json_decode(file_get_contents('https://kitsu.io/api/edge/trending/manga'), true);
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trending | Animanga</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:site_name" content="Animanga.CF" />
  <meta property="og:image" content="https://animanga.cf/assets/img/icon.png"/>
  <meta property="og:url" content="https://animanga.cf/trending"/>
  <meta property="og:title" content="Trending | Animanga"/>
  <meta property="og:description" content="Welcome to Animanga. Anime and Manga lookup made easy."/>
  <link rel="icon" href="assets/img/icon.png" type="image/x-icon"/>
  <link rel="shortcut icon" href="assets/img/icon.png"type="image/x-icon"/>
  <meta name="theme-color" content="#FBD0D0">
  <!-- CSS & JS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>
<body class="background">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="/">Animanga</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="search">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Trending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genres">Genres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://status.oblivionsan.tk" target="_blank">Status</a>
        </li>
      </ul>
      <div class="nav-social">
        <a target="_blank" href="https://discord.oblivionsan.tk"><i class="fab fa-discord"></i></a>
        <a target="_blank" href="https://twitter.com/OblivionSan"><i class="fab fa-twitter"></i></a>
        <a target="_blank" href="https://github.com/OblivionSan"><i class="fab fa-github"></i></a>
        <a target="_blank" href="https://oblivionsan.tk"><i class="fas fa-heart"></i></a>
      </div>
    </div>
  </nav>
  <!-- end of nav -->
  <main>
    <div class="jumbotron jumbotron-fluid">
    <div class="main-display">
      <h1 class="display-4">Trending - トレンド</h1>
      <p class="lead">Anime and Manga lookup made easy.</p>
    </div>
  </main>
  <div class="container background">
    <div style="margin-bottom: 25px;" class="text-center">
      <button class="tablinks btn btn-outline-secondary" onclick="openTab(event, 'Anime')" id="defaultOpen">Anime</button>
      <button class="tablinks btn btn-outline-secondary" onclick="openTab(event, 'Manga')">Manga</button>
    </div>
    <div style="margin-bottom: 25px;" id="Anime" class="tabcontent">
      <div class="row">
        <?php foreach($animeTrend['data'] as $data) { 
          $dataAtt = $data['attributes'];
          ?>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"><b><?php echo $dataAtt['canonicalTitle'];?></b> [<?php echo $data['id'];?>]</div>
            <div class="card-body">
              <div class="media">
                <a href="/search?anime=<?php echo $dataAtt['canonicalTitle']; ?>"><img style="border-radius: 3px;" class="mr-3" src="<?php echo $dataAtt['posterImage']['tiny']?>"></a>
                <div class="media-body">
                  <h5 class="mt-0"></h5>
                  <div class="table-responsive">
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <td style="border: none;">
                            <b>Type</b>: <?php echo ucfirst($data['type']);?> [<?php echo ucfirst($dataAtt['subtype']);?>]<br>
                            <b>Score</b>: <?php echo $dataAtt['averageRating'];?><br>
                            <b>Rating</b>: <?php echo $dataAtt['ageRating'];?> - <?php echo $dataAtt['ageRatingGuide'];?><br>
                            <b>Status</b>: <?php echo ucfirst($dataAtt['status']);?><br>
                            <b>Aired</b>: <?php echo $dataAtt['startDate'];?> to <?php echo $data['attributes']['endDate'];?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div style="margin-bottom: 25px;" id="Manga" class="tabcontent">
      <div class="row">
        <?php foreach($mangaTrend['data'] as $data) { 
          $dataAtt = $data['attributes'];
          ?>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"><b><?php echo $dataAtt['canonicalTitle'];?></b> [<?php echo $data['id'];?>]</div>
            <div class="card-body">
              <div class="media">
                <a href="/search?manga=<?php echo $dataAtt['canonicalTitle']; ?>"><img style="border-radius: 3px;" class="mr-3" src="<?php echo $dataAtt['posterImage']['tiny']?>"></a>
                <div class="media-body">
                  <h5 class="mt-0"></h5>
                  <div class="table-responsive">
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <td style="border: none;">
                            <b>Type</b>: <?php echo ucfirst($data['type']);?> [<?php echo ucfirst($dataAtt['subtype']);?>]<br>
                            <b>Score</b>: <?php echo $dataAtt['averageRating'];?><br>
                            <b>Rating</b>: <?php echo $dataAtt['ageRating'];?> - <?php echo $dataAtt['ageRatingGuide'];?><br>
                            <b>Status</b>: <?php echo ucfirst($dataAtt['status']);?><br>
                            <b>Aired</b>: <?php echo $dataAtt['startDate'];?> to <?php echo $dataAtt['endDate'];?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <footer class="footer text-center fixed-bottom">
    <button onclick="topFunction()" class="btn float-right top-button"><i class="fas fa-angle-up"></i></button>
  </footer>
  <script>
    document.getElementById("defaultOpen").click();
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover({html:true});
        $('.popover-dismiss').popover({
          trigger: 'focus'
        })
      });
  </script>
</body>
</html>