<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Women on GitHub</title>

    <meta name="author" content="Prabhanshu Attri and Fatima Rafiqui">	
	
	<meta property="og:type" content="article" />
	<meta property="og:site_name" content="Women on GitHub" />
	<meta property="og:title" content="Women on GitHub" />
	<meta property="og:description" content="Let's collect the data of Women on GitHub, who inspired you to code more, learn more. (Project started by tapasweni-pathak)" />
	<meta property="og:url" content="https://women-on-github.herokuapp.com/" />
	<meta property="og:image" content="images/girl_coder.jpg" />

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <?php
    //add database details of the scheduler app
    $dsn = "pgsql:"
                . "host=################compute-1.amazonaws.com;"
                . "dbname=##############;"
                . "user=##############;"
                . "port=5432;"
                . "sslmode=require;"
                . "password=##########################";

            $db = new PDO($dsn);
            $query = "SELECT * FROM users";
            $result = $db->query($query);
            $total = 90;
            if($result)
              $total = $result->rowCount();
            echo '<style>';
            for ($x = 1; $x <= $total; $x++) {
              echo '.menu-'.$x.' {
              -webkit-filter: url("#shadowed-goo");
              filter: url("#shadowed-goo");
            }
            .menu-open-button-'.$x.' {
              width: 35px;
              height: 35px;
            }
            .menu-item-'.$x.' {
              width: 40px;
              height: 40px;
            }
            .menu-item-'.$x.', .menu-open-button-'.$x.' {
              background: #ffc107;
              border-radius: 100%;
              margin-left: -40px;
              position: absolute;
              top: 20px;
              color: white;
              text-align: center;
              line-height: 40px;
              -webkit-transform: translate3d(0, 0, 0);
                      transform: translate3d(0, 0, 0);
              -webkit-transition: -webkit-transform ease-out 200ms;
              transition: -webkit-transform ease-out 200ms;
              transition: transform ease-out 200ms;
              transition: transform ease-out 200ms, -webkit-transform ease-out 200ms;
            }

            .menu-open-'.$x.' {
              display: none;
            }
            .menu-open-'.$x.':checked + .menu-open-button-'.$x.' {
              -webkit-transform: translate3d(0, 0, 0) rotate(45deg);
                      transform: translate3d(0, 0, 0) rotate(45deg);
            }
            .menu-open-'.$x.':checked + .menu-open-button-'.$x.' {
              -webkit-transform: translate3d(0, 0, 0) scale(0.1, 1);
                      transform: translate3d(0, 0, 0) scale(0.1, 1);
            }
            .menu-open-'.$x.':checked + .menu-open-button-'.$x.' {
              -webkit-transform: translate3d(0, 0, 0) rotate(-45deg);
                      transform: translate3d(0, 0, 0) rotate(-45deg);
            }

            .menu-'.$x.' {
              z-index: 999;
              position: relative;
              margin-top: -45px;
              left: 20%;
              margin-left: -80px;
              padding-top: 20px;
              padding-left: 80px;
              width: 650px;
              height: 70px;
              box-sizing: border-box;
              font-size: 20px;
              text-align: left;
            }

            .menu-item-'.$x.':hover {
              background: white;
              color: #ffc107;
            }
            .menu-item-'.$x.':nth-child(3) {
              -webkit-transition-duration: 180ms;
                      transition-duration: 180ms;
            }
            .menu-item-'.$x.':nth-child(4) {
              -webkit-transition-duration: 180ms;
                      transition-duration: 180ms;
            }
            .menu-item-'.$x.':nth-child(5) {
              -webkit-transition-duration: 180ms;
                      transition-duration: 180ms;
            }
            .menu-item-'.$x.':nth-child(6) {
              -webkit-transition-duration: 180ms;
                      transition-duration: 180ms;
            }

            .menu-open-button-'.$x.' {
              z-index: 999;
              -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
                      transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
              -webkit-transition-duration: 400ms;
                      transition-duration: 400ms;
              -webkit-transform: scale(1.1, 1.1) translate3d(0, 0, 0);
                      transform: scale(1.1, 1.1) translate3d(0, 0, 0);
              cursor: pointer;
            }

            .menu-open-button-'.$x.':hover {
              -webkit-transform: scale(1.2, 1.2) translate3d(0, 0, 0);
                      transform: scale(1.2, 1.2) translate3d(0, 0, 0);
            }

            .menu-open-'.$x.':checked + .menu-open-button-'.$x.' {
              -webkit-transition-timing-function: linear;
                      transition-timing-function: linear;
              -webkit-transition-duration: 200ms;
                      transition-duration: 200ms;
              -webkit-transform: scale(0.8, 0.8) translate3d(0, 0, 0);
                      transform: scale(0.8, 0.8) translate3d(0, 0, 0);
            }

            .menu-open-'.$x.':checked ~ .menu-item-'.$x.' {
              -webkit-transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
                      transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .menu-open-'.$x.':checked ~ .menu-item-'.$x.':nth-child(3) {
              -webkit-transition-duration: 170ms;
                      transition-duration: 170ms;
              -webkit-transform: translate3d(35px, 0, 0);
                      transform: translate3d(35px, 0, 0);
            }
            .menu-open-'.$x.':checked ~ .menu-item-'.$x.':nth-child(4) {
              -webkit-transition-duration: 250ms;
                      transition-duration: 250ms;
              -webkit-transform: translate3d(80px, 0, 0);
                      transform: translate3d(80px, 0, 0);
            }
            .menu-open-'.$x.':checked ~ .menu-item-'.$x.':nth-child(5) {
              -webkit-transition-duration: 330ms;
                      transition-duration: 330ms;
              -webkit-transform: translate3d(125px, 0, 0);
                      transform: translate3d(125px, 0, 0);
            }
            .menu-open-'.$x.':checked ~ .menu-item-'.$x.':nth-child(6) {
              -webkit-transition-duration: 410ms;
                      transition-duration: 410ms;
              -webkit-transform: translate3d(170px, 0, 0);
                      transform: translate3d(170px, 0, 0);
            }';
          }
          echo '</style>';
    ?>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="images/logo.png">
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="https://github.com/tapasweni-pathak/Women-GitHubers" target="_blank">View on Github</a>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="images/logo.png">
          </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item"><a href="http://tapasweni-pathak.github.io/" target="_blank">About Tapasweni Pathak</a></li>
            <li class="mdl-menu__item"><a href="http://prabhanshu.com/" target="_blank">About Prabhanshu Attri</a></li>
            <li class="mdl-menu__item"><a href="http://fatimarafiqui.com/" target="_blank">About Fatima Rafiqui</a></li>
            <li class="mdl-menu__item"><a href="https://opensource.org/licenses/MIT" target="_blank">License</a></li>
          </ul>
        </div>
      </div>
      <div class="android-content mdl-layout__content">
        <div class="android-more-section" id="top">
          <div class="android-card-container mdl-grid">


          <?php

            $count = 1;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__media user-img">
                  <img class="avatar" src="'.$row['avatar_url'].'" alt="'.$row['name'].'">
                  <span class="id-element mdl-typography--font-light">'.$row['id'].'</span>
                  <nav class="menu-'.$count.'">
                    <input type="checkbox" href="#" class="menu-open-'.$count.'" name="menu-open-'.$count.'" id="menu-open-'.$count.'"/>
                    <label class="menu-open-button-'.$count.'" for="menu-open-'.$count.'"><i class="fa fa-bars"></i>
                    </label>
                    <a href="'.$row['html_url'].'" class="menu-item-'.$count.'" target="_blank"><i class="fa fa-link"></i></a>';
              if ($row['blog'])
                echo '<a href="'.$row['blog'].'" class="menu-item-'.$count.'" target="_blank"><i class="fa fa-feed"></i></a>';
              if ($row['email'])
                echo '<a href="mailto:'.$row['email'].'" class="menu-item-'.$count.'" target="_blank"><i class="fa fa-envelope"></i></a>';
              echo '</nav>
                </div>              
                <div class="mdl-card__supporting-text">
                  <span class="mdl-typography--font-light mdl-typography--subhead">
                  <table>
                    <tr>
                      <td><i class="fa fa-user"></i>
                      <td><h4 class="android-header">'.$row['login'].'</h4>
                    </tr>';
                if ($row['name'])
                  echo '<tr>
                      <td>
                      <td>('.$row['name'].')
                    </tr>';
                if ($row['company'])
                  echo '<tr>
                      <td><i class="fa fa-group"></i>
                      <td>'.$row['company'].'
                    </tr>';
                if ($row['location'])
                  echo '<tr>
                      <td><i class="fa fa-location-arrow"></i>
                      <td>'.$row['location'].'
                    </tr>';
                if ($row['created_at'])
                  echo '<tr>
                      <td><i class="fa fa-clock-o"></i>
                      <td>Joined on '.$row['created_at'].'
                    </tr>';
                  echo '</table>
                </div>
                <div class="mdl-card__actions">
                   <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="'.$row['html_url'].'" target="_blank">
                     View on Github
                     <i class="fa fa-github"></i>
                   </a>
                </div>
              </div>';
              if ($count%4 == 0)
                echo '</div>
                      <div class="android-card-container mdl-grid">';
              $count += 1;
            }
            $result->closeCursor();
          ?>
          </div>
        </div>

        <footer class="android-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--left-section">
              <span class="mdl-typography--font-light"><a href="https://opensource.org/licenses/MIT" target="_blank">The MIT License (MIT)</a>. Copyright © 2016 <a href="http://prabhanshu.com" target="_blank">Prabhanshu Attri</a> and <a href="http://fatimarafiqui.com" target="_blank">Fatima Rafiqui</a></span>
            </div>
            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Back to Top
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="material.min.js"></script>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1"> <defs> <filter id="shadowed-goo"> <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" /> <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" /> <feGaussianBlur in="goo" stdDeviation="3" result="shadow" /> <feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" /> <feOffset in="shadow" dx="1" dy="1" result="shadow" /> <feComposite in2="shadow" in="goo" result="goo" /> <feComposite in2="goo" in="SourceGraphic" result="mix" /> </filter> <filter id="goo"> <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" /> <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" /> <feComposite in2="goo" in="SourceGraphic" result="mix" /> </filter> </defs> </svg>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
