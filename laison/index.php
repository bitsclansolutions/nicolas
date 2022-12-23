<?php

session_start();
$_SESSION["border_image"] = "";
$_SESSION["inner_image"] = "";
$_SESSION["is_symmetric"] = "";
$_SESSION["border_img_id"] = "";
$_SESSION["border_top"] = "";
$_SESSION["border_bottom"] = "";
$_SESSION["border_left"] = "";
$_SESSION["border_right"] = "";
$_SESSION["corner_tl"] = "";
$_SESSION["corner_tr"] = "";
$_SESSION["corner_bl"] = "";
$_SESSION["corner_br"] = "";
$_SESSION["border_color_img"] = "";
require_once("sct-admin/simpleusers/su.inc.php");


$SimpleUsers = new SimpleUsers();
$arr = $SimpleUsers->getColor();

require_once('class.translation.php');
$lang = "fr";
if (isset($_GET['lang'])) {
    $translate = new Translator($_GET['lang']);
    $lang = $_GET['lang'];
} else {
    $translate = new Translator('fr');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>


    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php $translate->__('Simulateur cimentrie de la tour'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Découvrez le simulateur de carreaux de ciment par la Cimenterie de la Tour afin de visualiser vos projets.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
    <link href="menu/css/sm-core-css.css" rel="stylesheet" type="text/css" />
    <link href="menu/css/sm-clean/sm-clean.css" rel="stylesheet" type="text/css" />
    <link href="qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" href="scroll/jquery.mCustomScrollbar.css" />
    <script src="scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="scroll/js/minified/jquery.mousewheel-3.0.6.min.js"></script>
    <script type="text/javascript" src="d/jquery-css-transform/jquery-css-transform.js"></script>
    <script type="text/javascript" src="d/rotate3Di.js"></script>





    <style type="text/css">
        body{overflow-x:hidden !important;}
        #main-menu {position: relative;width: auto;}
        #main-menu ul {width: 12em;}
        table {font-family: arial, sans-serif;border-collapse: collapse;border: none;}
        td,th {text-align: left;}
        tr:nth-child(even) {background-color: #dddddd;}
        .bordr-img {width: 59px;}
        .inner-img {width: 59px;}
        #table-wrap table {margin-top: 0;}
        #borderr table tbody tr td img {width: 19px;}
        #table-wrap td {background-color: white;}
        .motif-lable-box .sub-nav-active {background-color: #000;}
        label.motif-lable-text.sub-nav-link.sub-nav-active{border: 1px solid #000 !important;}
        .motif-lable-box .sub-nav-active p{color: #ffffff;}
        .colordiv-border {border: 2px solid black;}
        .hsn_css {width: 20px !important;}
    </style>
    <style>
        .tile-toolbox {float: right;margin-top: 50px;position: relative;}
    </style>
    <!--  Hexagon CSS  -->
    <style>
        .es-carousel ul li {
            margin-right: 20px;
        }
        .none-1024{
            display: none;
        }
        .content-hide-image {
            width: 45%;
            margin: 0 auto;
        }
        .content-hide-image img {
            width: 100%;
            height: 100%;
        }
        .rotation-block.flex-control-btn-box{
            margin-top: 20px;
        }
        .btn-info {
            background-color: transparent !important;
            background-image: none;
            border: 2px solid #000 !important;
            transition: all 0.3s ease-in-out;
        }
        .btn-info:hover{
            background-color: #000 !important;
            color: #ffffff !important;
        }
        .btns-flex-bar {
            margin-right: 30px;
        }
        .active-btn{
            background-color: #000 !important;
            color: #ffffff !important;
        }
        .navbar-expand-lg .navbar-collapse {
            margin-right: 30px;
        }
        .text-white{
            color: #000000 !important;
        }
        .click-btn-blue:focus,
        .click-btn-blue:active{
            outline: none !important;
            box-shadow: none !important;
        }
        span.glyphicon.glyphicon-repeat{
            margin-right: 7px;
        }
        .blue-btn-rotate{
            width: 20%;
            text-align: center;
            background-color: #000;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff !important;
            font-size: 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .flex-control-btn-box{
            display: flex !important;
            justify-content: center;
        }

        ul#main-menu li .active-btn{
            color: #ffffff !important;
        }

        *,*:after,*:before {box-sizing: inherit;}
        * {margin: 0;padding: 0;border: 0 none;position: relative;}
        :root {--sinSerif: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;--Nhexa: 4;--gap: 2vw;--size: calc(calc(100vw / var(--Nhexa)) - var(--gap));}
        @media only screen and (min-width: 1100px) {
            :root {--Nhexa: 6;}
        }
        @media only screen and (max-width: 600px) {
            :root {--Nhexa: 2;}
            body {margin-right: calc(var(--size) * .3);}
        }

        section {margin: calc(var(--size) * .5) auto 0;width: calc(var(--size) * calc(var(--Nhexa) - 1));display: grid;grid-template-columns: repeat(var(--Nhexa), 1fr);grid-gap: var(--gap);}
        .article-shpae-box {background: cadetblue;width: var(--size);height: calc(var(--size) / 1.1111111);clip-path: url(#hexagono);clip-path: polygon(25% 0, 75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%);margin-right: calc(var(--size) / 2);color: #fff;overflow: hidden;}
        .article-shpae-box:nth-child(2n) {margin: calc(var(--size) * -.5) calc(var(--size) * -.25) 0 calc(var(--size) * -.75);}
        .article-shpae-box::before {content: '';float: left;width: 25%;height: 100%;clip-path: polygon(0% 0%, 100% 0%, 0% 50%, 100% 100%, 0% 100%);shape-outside: polygon(0% 0%, 100% 0%, 0% 50%, 100% 100%, 0% 100%);}
        .article-shpae-box img {width: var(--size);height: var(--size);position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);transform-origin: 0% 50%;transition: .75s;clip-path: url(#hexagono);clip-path: inherit;z-index: 10;}

        .left-col-section{width:35%;display:block;}
        .right-col-section{width:55%;display:block;}
        .tile-making-section{width:100%;display:flex;}
        .rotation-block{width:100%;display:block;}


        @media screen and (min-width: 1024px) and (max-width: 1378px)
        {
            .tile-making-section{width:100%;display:block;}
            .left-col-section{width:100%;display:block;}
            .right-col-section{width:100%;display:block;margin-top: 40px;}
            .codr{margin-bottom: 10px;}
            .main-flex-box-wraper{width:70%;margin:20px auto;}


        }


        @media(max-width: 1049px){
            .es-carousel ul li {
                margin-right: 30px;
            }
            .btns-flex-bar {
                margin-right: 30px;
            }
            .navbar-expand-lg .navbar-collapse {
                margin-right: 30px;
            }
            div#table-wrap img {
                width: 95% !important;
                height: 95% !important;
            }
        }

        @media(max-width: 1050px){
            .none-div-1023{
                display: none;
            }
            .none-1024{
                display: block;
            }
            .text-on-1223{
                font-size: 27px;
                text-transform: capitalize;
                color: #000000;
                padding: 20px 0;
            }
        }

        @media(max-width: 430px){
            body{
                margin-right: 0;
            }
            .none-1024 {
                margin-top: 60px;
            }

            .content-hide-image {
                width: 75%;
            }
        }

    </style>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="ie/html5shiv/src/html5shiv.js" type="text/javascript"></script>
    <script src="ie/repond/src/respond.js" type="text/javascript"></script>
    <![endif]-->

    <!--[if lt IE 8]>
    <link href="ie/css/bootstrap-ie7.css" rel="stylesheet">
    <![endif]-->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-708956-12', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body>
<div class="none-1024">
    <div class="content-hide-image"><img src="./Hidden-cuate.png" /></div>
    <h1 class="text-on-1223">Sorry, We are currently not available for this page Size</h1>
    <p style="color: #999999;
    text-align: center;
    font-size: 18px;">Try to visit this site using screen width more then '1050px', Thankyou</p>
</div>

<div class="none-div-1023">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo"></a>
            <div class="collapse navbar-collapse col" id="navbarNavDropdown">
                <!--<ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carreaux de ciment</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Zellij</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Granito/Terrazzo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Designers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Tendances</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Galerie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Actu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Simulateur</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-file-alt color-red-agnet"></i> Devis</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>




                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle menu-after" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Langue
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?lang=fr"> <img class="flag" src="../src/flag_fr.png" alt="fr"></a>
                            <a class="dropdown-item" href="?lang=en"><img class="flag" src="../src/flag_en.png" alt="en"></a>
                        </div>
                    </li>
                </ul>-->
            </div>
        </nav>
    </header>
    <div class="containerkk ctn">

        <div class="content">

            <div class="row">
                <div class="serch-bar-main-box">
                    <label for="search-bar" class="top-search-bar">
                        <h1 class="common-heading-text">Simulateur carreaux de ciment</h1>
                        <input type="search" id="search-bar" placeholder="Rechercher une reference">
                    </label>
                </div>
                <nav class="codr">
                    <div style="padding-top:6px;margin-top:2px;margin-bottom:1%;">
                        <?php
                        $motifs = list_dir("data/Motifs");
                        $octogones = list_dir("data/Octogones");
                        $autres_formats = list_dir("data/Autres_formats");
                        $artistes = list_dir("data/Artistes");
                        ?>
                        <ul class="px-0 sm sm-clean" id="main-menu" style="width: auto;" data-smartmenus-id="14132519898276223">
                            <!-- OLD CATEGORIES LOCATION -->
                            <?php
/*                            include('admin/connect.php');
                            $sql = "SELECT * FROM `categories`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                */?><!--
                                <?php /*$category_id = $row['id']; */?>
                                <li style="margin-right: 10px;">
                                    <button type="button" class="click-btn-blue btn btn-info text-white btn-lg px-5 category_list" data-category_id="<?/*= $category_id */?>" href="#" title="<?php /*echo $row['nom'] */?>" id="<?php /*echo $row['nom'] */?>"> <?php /*$translate->__($row['nom']); */?> </button>
                                </li>
                            --><?php /*} */?>

                        </ul>
                    </div>
                </nav>
                <div class="motif"></div>
                <div class="tile-making-section justify-content-between">
                    <div class="left-col-section px-0">

                        <!-- OLD CONCEPT DIV HERE -->




                        <!----------------------------
                        ------------------------------
                        ------------------------------
                        ------------------------------>

                        <div class="serch-wraper-main">



                            <h1 class="common-heading-text">Etape 1 : choisir le format</h1>
                            <div class="shape-radio-btns-wraper">
                                <div class="main-flex-box-wraper">

                                    <div class="flex-shape-box">
                                        <input class="form-check-input category_list" data-category_id="1" type="radio" name="img_format" id="20x20" checked>
                                        <label for="20x20">
                                            <p class="format">20x20</p>
                                        </label>
                                    </div>

                                    <div class="flex-shape-box">
                                        <input class="form-check-input category_list" data-category_id="2" type="radio" name="img_format" id="10x10">
                                        <label for="10x10">
                                            <p class="format">10x10</p>
                                        </label>
                                    </div>

                                    <div class="flex-shape-box">
                                        <input class="form-check-input category_list" data-category_id="3" type="radio" name="img_format" id="Bordure">
                                        <label for="Bordure">
                                            <p class="format">Bordure</p>
                                        </label>
                                    </div>

                                    <div class="flex-shape-box">
                                        <input class="form-check-input hexagonal-shape category_list custom-widht-adjust" data-category_id="4" type="radio" name="img_format" id="Hexagonal">
                                        <label for="Hexagonal">
                                            <p class="format">Hexagonal</p>
                                        </label>
                                    </div>

                                    <div class="flex-shape-box">
                                        <input class="form-check-input octagonal-shape category_list" data-category_id="5" type="radio" name="img_format" id="Octogonal">
                                        <label for="Octogonal">
                                            <p class="format">Octogonal</p>
                                        </label>
                                    </div>
                                    <div class="flex-shape-box">
                                        <input class="form-check-input category_list" data-category_id="6" type="radio" name="img_format" id="Autrus">
                                        <label for="Autrus">
                                            <p class="format">Autrus</p>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h1 class="common-heading-text">Etape 2 : choisir votre motif</h1>

                            <div class="motif-label-box">

                            </div>

                            <div id="rg-gallery" class="rg-gallery" style="background: #fff;">

                                <div class="concept" style="margin-bottom: 50px;">
                                    <div id="color-palette" style="text-align: left;">
                                        <button style="margin-top: 1%;" value="btn btn-info" class="btn btn-secondary btn-large ccomm btn-responsive" title="<?php $translate->__('Plus de couleur'); ?>"><?php $translate->__('Utilisez nos couleurs pour créer votre carreau'); ?> </button>
                                        <div id="color-palette-interior" style="display:none">
                                            <a title="<?php $translate->__('Couleurs sur commande'); ?>" class="title helpcolor"><?php $translate->__('Cliquer sur la couleur choisie,puis positionner le curseur a l endroit ou vous souhaitez changer la couleur dans le carreau'); ?>
                                            </a>
                                            <div id="colorforuni" style="display:none">
                                                <div style="float:left;">
                                                    <table>
                                                        <tbody>
                                                        <?php $translate->__('Couleurs sur commande'); ?>
                                                        <?php
                                                        $count = 0;
                                                        foreach ($arr as $key => $value) {
                                                        $count++;
                                                        if ($value['type'] == 'com') {
                                                        if ($count == 16) { ?> <tr> <?php $count = 0;
                                                            }
                                                            ?>
                                                            <td style="background: <?php echo '#' . $value['name']; ?>" class="palette-color cuz" original-title="<?php echo $value['color']; ?>"></td>
                                                            <?php
                                                            }
                                                            } ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div style="float:left;">

                                                    <?php $translate->__('Couleurs en stock'); ?>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td style="background: #fdd34b" class="palette-color cuz" original-title="U4 jaune"></td>
                                                            <td style="background: #f9c555" class="palette-color cuz" original-title="u24 ocre jaune"></td>
                                                            <td style="background: #f3edcd" class="palette-color cuz" original-title="U3 jaune clair"></td>
                                                            <td style="background: #f6f6f6" class="palette-color cuz" original-title="U8 blanc"></td>
                                                            <td style="background: #f7e7c6" class="palette-color cuz" original-title="U16 saumon"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #8f8734" class="palette-color cuz" original-title="U31 vert kaki"></td>
                                                            <td style="background: #679e4b" class="palette-color cuz" original-title="U6 vert"></td>
                                                            <td style="background: #a2a884" class="palette-color cuz" original-title="U26 vert de gris"></td>
                                                            <td style="background: #92a53a" class="palette-color cuz" original-title="U29 vert amande"></td>
                                                            <td style="background: #93987a" class="palette-color cuz" original-title="U36 vert mousse"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #bca68e" class="palette-color cuz" original-title="U18 marron glacé"></td>
                                                            <td style="background: #d96453" class="palette-color cuz" original-title="U2 rouge"></td>
                                                            <td style="background: #725f51" class="palette-color cuz" original-title="U37 kaki brun"></td>
                                                            <td style="background: #d3babd" class="palette-color cuz" original-title="U14 aubergine"></td>
                                                            <td style="background: #ebdcbb" class="palette-color cuz" original-title="U30 camel"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #2a373f" class="palette-color cuz" original-title="U9 noir"></td>
                                                            <td style="background: #696b68" class="palette-color cuz" original-title="U32 gris anthracite"></td>
                                                            <td style="background: #a8a8a6" class="palette-color cuz" original-title="U27 gris foncé"></td>
                                                            <td style="background: #d8d8d8" class="palette-color cuz" original-title="U11 gris"></td>
                                                            <td style="background: #dad4c6" class="palette-color cuz" original-title="U12 gris ancien"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #01648b" class="palette-color cuz" original-title="U28 bleu petrole"></td>
                                                            <td style="background: #4692c6" class="palette-color cuz" original-title="U23 outre mer"></td>
                                                            <td style="background: #bedeed" class="palette-color cuz" original-title="U7 bleu"></td>
                                                            <td style="background: #99c7e8" class="palette-color cuz" original-title="U35 bleu céladon"></td>
                                                            <td style="background: #7198b9" class="palette-color cuz" original-title="U34 bleu jean"></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="background: #a91c22" class="palette-color cuz" original-title="u22 rouge foncé"></td>
                                                            <td style="background: #794f3f" class="palette-color cuz" original-title="U19 brun foncé"></td>
                                                            <td style="background: #225172" class="palette-color cuz" original-title="U50"></td>
                                                            <td style="background: #698fb3" class="palette-color cuz" original-title="U51"></td>
                                                            <td style="background: #2e94a9" class="palette-color cuz" original-title="U54"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #e9e6d6" class="palette-color cuz" original-title="U65"></td>
                                                            <td style="background: #96a6b5" class="palette-color cuz" original-title="U68"></td>
                                                            <td style="background: #c5d9b4" class="palette-color cuz" original-title="U78"></td>
                                                            <td style="background: #82282e" class="palette-color cuz" original-title="U83"></td>
                                                            <td style="background: #f2cf77" class="palette-color cuz" original-title="U103"></td>
                                                        </tr>
                                                        <tr>
                                                            <?php


                                                            foreach ($arr as $key => $value) {
                                                                if ($value['type'] == 'stk') {

                                                                    ?>
                                                                    <td style="background: <?php echo '#' . $value['name']; ?>" class="palette-color cuz" original-title="<?php echo $value['color']; ?>"></td>

                                                                    <?php
                                                                }
                                                            } ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div id="color-motif" style="width: 100%; float: left;">


                                                <div style="float: left;">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td style="background: #fdd34b" class="palette-color" original-title="U4 jaune"></td>
                                                            <td style="background: #f9c555" class="palette-color" original-title="u24 ocre jaune"></td>
                                                            <td style="background: #f3edcd" class="palette-color" original-title="U3 jaune clair"></td>
                                                            <td style="background: #f6f6f6" class="palette-color" original-title="U8 blanc"></td>
                                                            <td style="background: #f7e7c6" class="palette-color" original-title="U16 saumon"></td>
                                                            <td style="background: #8f8734" class="palette-color" original-title="U31 vert kaki"></td>
                                                            <td style="background: #679e4b" class="palette-color" original-title="U6 vert"></td>
                                                            <td style="background: #a2a884" class="palette-color" original-title="U26 vert de gris"></td>
                                                            <td style="background: #92a53a" class="palette-color" original-title="U29 vert amande"></td>
                                                            <td style="background: #93987a" class="palette-color" original-title="U36 vert mousse"></td>
                                                            <td style="background: #bca68e" class="palette-color" original-title="U18 marron glacé"></td>
                                                            <td style="background: #794f3f" class="palette-color" original-title="U19 brun foncé"></td>
                                                            <td style="background: #725f51" class="palette-color" original-title="U37 kaki brun"></td>
                                                            <td style="background: #d3babd" class="palette-color" original-title="U14 aubergine"></td>
                                                            <td style="background: #ebdcbb" class="palette-color" original-title="U30 camel"></td>

                                                        </tr>



                                                        <tr>
                                                            <td style="background: #2a373f" class="palette-color" original-title="U9 noir"></td>
                                                            <td style="background: #696b68" class="palette-color" original-title="U32 gris anthracite"></td>
                                                            <td style="background: #a8a8a6" class="palette-color" original-title="U27 gris foncé"></td>
                                                            <td style="background: #d8d8d8" class="palette-color" original-title="U11 gris"></td>
                                                            <td style="background: #dad4c6" class="palette-color" original-title="U12 gris ancien"></td>
                                                            <td style="background: #01648b" class="palette-color" original-title="U28 bleu petrole"></td>
                                                            <td style="background: #4692c6" class="palette-color" original-title="U23 outre mer"></td>
                                                            <td style="background: #bedeed" class="palette-color" original-title="U7 bleu"></td>
                                                            <td style="background: #99c7e8" class="palette-color" original-title="U35 bleu céladon"></td>
                                                            <td style="background: #7198b9" class="palette-color" original-title="U34 bleu jean"></td>
                                                            <td style="background: #a91c22" class="palette-color" original-title="u22 rouge foncé"></td>
                                                            <td style="background: #d96453" class="palette-color" original-title="U2 rouge"></td>
                                                            <td style="background: #fcb0d6" class="palette-color" original-title="U1 rose"></td>
                                                            <td style="background: #225172" class="palette-color" original-title="U50"></td>
                                                            <td style="background: #698fb3" class="palette-color" original-title="U51"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: #2e94a9" class="palette-color" original-title="U54"></td>
                                                            <td style="background: #e9e6d6" class="palette-color" original-title="U65"></td>
                                                            <td style="background: #96a6b5" class="palette-color" original-title="U68"></td>
                                                            <td style="background: #c5d9b4" class="palette-color" original-title="U78"></td>
                                                            <td style="background: #82282e" class="palette-color" original-title="U83"></td>
                                                            <td style="background: #f2cf77" class="palette-color" original-title="U106"></td>
                                                        </tr>


                                                        <?php

                                                        $count2 = 0;

                                                        foreach ($arr as $key => $value) {
                                                        $count2++;

                                                        if ($count2 == 15) { ?> <tr> <?php $count2 = 0;
                                                            }

                                                            ?>

                                                            <td style="background: <?php echo '#' . $value['name']; ?>" class="palette-color" original-title="<?php echo $value['color']; ?>"></td>

                                                            <?php  } ?>


                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="colorcant">
                                                    <ul>
                                                        <li>
                                                            <div style="background-color: #2a373f; display:none;" id="current-color"></div>
                                                        </li>
                                                        <li style=" padding-top: 5%;">
                                                            <div id="current-colorref">U9 noir</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                            <div id="selfcolor" style="display:none;">
                                                <p style="font-size: 12px;text-align: center;border:solid 1px;color:#a91c22;"><?php $translate->__('Sur commande uniquement et  à partir d une surface minimum  de 12 métres carrés'); ?></p><br />

                                                <div style="float:left;"><?php $translate->__('Mes couleurs'); ?>: </div>

                                            </div>

                                        </div>











                                    </div>

                                    <div class="clear"></div>

                                </div>

                                <div style="" class="rg-image-wrapper">

                                    <div>
                                        <div>
                                            <!--<div class="enstok"></div>-->
                                            <p class='txtocto' style="display:none; font-size: 12px;margin-bottom: 5px;text-align: left;border-bottom: solid 1px;"><?php $translate->__('Choisissez votre cabochon en cliquant dessus, puis pour modifier la couleur de l octogone cliquez sur une couleur de votre choix et positionner le curseur sur l octogone'); ?>

                                            </p>

                                            <div class="rg-image">

                                                <form role="form" class="checkuni" style="display:none;">
                                                    <div>

                                                        <input type="checkbox" id="contouruni" style="width:20px;"> <label><?php $translate->__('Contour'); ?></label>
                                                    </div>
                                                    <div>

                                                        <input type="checkbox" id="interieuruni" checked="checked" style="width:20px;"> <label><?php $translate->__('Interieur'); ?>
                                                        </label>
                                                        <p style="width:141px"><?php $translate->__('Choisir Contour ou Interieur, puis cliquez sur une couleur de votre choix'); ?></p>
                                                    </div>

                                                </form>
                                                <div class="colorresult" style="display:none;"></div>



                                                <img style="cursor:crosshair" src="" id="result" alt="">
                                                <img style="cursor:crosshair" src="" id="result_corner" alt="">
                                                <div class="colorresultborder" style="display:none;"></div>

                                                <img style="cursor:crosshair;display:none;" src="" id="resultborder" alt="">
                                                <img style="display:none;" src="" id="ang">
                                            </div>

                                            <!--<div class="rg-loading" style="display: none;">
                                            </div>-->

                                            <div class="rg-caption-wrapper">
                                                <div style="" class="rg-caption">
                                                    <p style="display:none;"></p>
                                                    <div id="refp"></div>
                                                    <div id="refb"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<button id="validecolor" value="btn btn-primary btn-large" class="btn btn-primary btn-responsive" style="display:none;position: absolute; bottom: 16%;">
                                <?php /*$translate->__('Valider'); */?>
                            </button>-->
                                <!--<p id="txtvalidate" style="display:none;">--><?php /*$translate->__('Avant de valider , supprimer les couleurs non choisies, et ensuite vous pourrez demander un devis/ enregistrer/imprimer'); */?>

                                </p>
                                <div class="rg-thumbs">
                                    <!-- Elastislide Carousel Thumbnail Viewer -->
                                    <div class="es-carousel-wrapper">
                                        <a class="title bnd1"> <?php $translate->__('Choisissez une famille dans le bandeau ci-dessus,ensuite cliquez sur le carreau de votre choix'); ?> </a>
<!--                                        <a class="titlem" title="--><?php //$translate->__('Choisir un modele'); ?><!--" id="colname">--><?php //$translate->__('les_colores'); ?><!-- </a>-->
                                        <div class="es-carousel">
                                            <ul>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- End Elastislide Carousel Thumbnail Viewer -->
                                </div><!-- rg-thumbs -->
                            </div>

                            <!--<div class="nicolson-images-box">
                                <div class="container p-0">
                                    <div class="row nicol-image-srroller">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>


                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 image-padding-box">
                                            <div class="nicol-image-box">
                                                <div class="image-box">
                                                    <img src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                                </div>
                                                <p>M!554</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>-->

                        </div>


                        <style>
                            .form-check-input:focus {outline: none !important;}
                            label.top-search-bar {display: flex;align-items: center;justify-content: flex-start;}
                            h1.common-heading-text {font-size: 16px;font-weight: 600;text-align: left !important;margin-right: 20px;}
                            label.top-search-bar input {border: 1px solid #cccccc;border-radius: 10px;height: 40px;outline: none;width: 300px;padding: 0 10px;color: #999999;font-size: 16px !important;font-weight: 500 !important;}
                            label.top-search-bar input::placeholder {font-size: 14px;color: #999;}
                            .shape-radio-btns-wraper input {width: 50px;height: 50px;border-radius: 0 !important;border: none;background-color: #d3d3d3;}
                            .flex-shape-box {display: flex;flex-direction: column;align-items: center;}
                            .main-flex-box-wraper {display: flex;justify-content: space-between;width: 75%;margin-top: 20px;}
                            .flex-shape-box label p {font-size: 14px;color: #000000;margin: 5px 0 0 0;font-weight: 600;}
                            .hexagonal-shape {clip-path: polygon(51% 0, 100% 29%, 100% 71%, 51% 100%, 50% 100%, 0 72%, 0 28%);}
                            .custom-widht-adjust {width: 45px !important;}
                            .octagonal-shape {clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%) !important;}
                            .form-check-input:checked {background-color: #000 !important;}
                            .form-check-input:focus {box-shadow: none !important;}
                            label.motif-lable-text {border: 1px solid #999999;padding: 10px 20px;border-radius: 100px;margin: 0 15px 10px 0;}
                            label.motif-lable-text p {margin: 0;font-size: 16px;font-weight: 600;}.motif-label-box {display: flex;flex-wrap: wrap;margin-top: 20px;}
                            .motif-label-radio {display: none;}
                            .image-box {width: 100%;height: 90px;}
                            .image-box img {width: 100%;height: 100%;object-fit: cover;}
                            .nicol-image-box p {font-size: 14px;font-weight: 600;color: #000000;text-align: center;margin: 3px 0;}
                            .image-padding-box {padding: 0 10px !important;}
                            .nicol-image-srroller {height: 100%;max-height: 500px;overflow-y: scroll;margin-top: 20px;}
                            .nicol-image-srroller::-webkit-scrollbar {display: none;}
                            .btns-flex-bar button {margin: 10px 0 10px 0;width: 130px;height: 40px;}
                            .btn-warning {width: 130px;height: 40px;}
                            .btns-flex-bar {display: flex;flex-direction: column;}
                            .chart-flex-control-box {display: flex;flex-direction: row-reverse;justify-content: space-between;}
                            .flex-1-box {flex: 1;margin-right: 30px;}
                            .color-red-agnet {color: #a9372d !important;}
                            .btn{font-size: 16px;}
                            .width-box-modal {width: 80% !important;max-width: 80% !important;}
                            .modal-input-forms {display: flex;justify-content: space-between; margin: 20px 0; padding: 0 25px 0 10px; align-items: center;}
                            label.modal-input-forms input {height: 30px;outline: none;border: 1px solid #999999;border-radius: 5px;width: 60%;padding: 0 10px;font-size: 14px;color: #999999;}
                            .custom-90 {width: 87.4% !important;}
                            h1.text-side-form {font-size: 21px;font-weight: 700;text-decoration: underline;}
                            .image-modal img {width: 100%;height: 100%;object-fit: cover;}
                            .image-modal {width: 150px;height: 150px;border: 2px solid #cccccc;}
                            .modal-image-box-wraper p {font-weight: 600;font-size: 18px;}
                            .images-and-text {display: flex;align-items: center;margin-left: 90px;}
                            .images-and-text p {font-size: 23px;font-weight: 700;margin-left: 60px;margin-bottom: 0;}
                            .modal-image-box-wraper {margin-top: 30px;}
                            .form-images-inputs {
    justify-content: start;
    align-items: center;
    padding-left: 15px;
}
                            .text-area-input {width: 97%;border-radius: 5px;height: 100px;border: 1px solid #999999;outline: none;padding: 10px;}
                            .form-modal-btn button {width: 150px;height: 50px;color: #ffffff;background-color: #000000;border-radius: 5px;margin-top: 20px;}
                            .form-modal-btn {display: flex;justify-content: flex-end;}
                            .btn-devis,button.btn-devis.btn.btn-success.btn-responsive{background-color: transparent !important;border-color: #000000 !important;border-radius: 5px !important;}
                            a.btn-devis.btn.btn-responsive {
                                padding: 11px 0;
                                margin-top: 10px;
                                margin-bottom: 10px;
                            }
                            
                            
                        </style>
                        
                        <style>
                            .row{
                                background: transparent !important;
                            }
                            .form-modal-btn {
    margin-right: 30px;
}
.modal-image-box-wraper p {
    padding-left: 15px;
}
.direction-coloumn-textarea{
    flex-direction: column;
    align-items: self-start;
}
                        </style>

                        <!---------------------------------------------------------------------------------------------------------------------->
                    </div>
                    <div class="right-col-section">

                        <div class="chart-flex-control-box">

                            <div class="btns-flex-bar">

                                <a class="title" title="<?php $translate->__('Composition'); ?>"></a>
                                <button disabled id="devis" value="btn btn-info" class="btn-devis btn btn-large btn-responsive" data-bs-toggle="modal" href="#DevisModal" role="button" title="<?php $translate->__('Demander un devis'); ?>"><i class="fas fa-file-alt"></i><?php $translate->__('Devis'); ?></button>
                                <button disabled id="pop1" value="btn btn-large" class="btn-devis btn btn-responsive" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fas fa-cube"></i>3D</button>
<!--                                <button id="compsave" value="btn btn-primary btn-large" class="btn-devis btn  btn-responsive"><i class="fas fa-save"></i>--><?php //$translate->__('Save'); ?><!-- </button>-->
                                <button disabled id="imprimer" value="btn btn-primary btn-large" class="btn-devis btn  btn-responsive"><i class="fas fa-print"></i><?php $translate->__('Imprimer'); ?> </button>
                                <a href="./" class="btn-devis btn btn-responsive" type="button" name="color"><i class="fas fa-trash"></i><?php $translate->__('Clean'); ?></a>
                                <button id="aide" value="btn btn-primary btn-large" class="btn-devis btn btn-responsive"><i class="fa fa-question-circle"></i><?php $translate->__('Aide'); ?> </button>

                            </div>

                            <div>
                                <div id="table-wrap" class="imp flex-1-box">
                                    <img alt="" src="moz.php" width="90%" height="90%" class="compic mt-0">
                                    <div class="list-group" style="background: #e6e6e6 ;display:none">
                                        <a href="#" class="list-group-item " style="background: #e6e6e6">
                                            <h4 class="list-group-item-heading">Fabrication specifique minimum:<span>10 Metres carres</span> </h4>
                                            <h4 class="list-group-item-heading">Delai fabrication:<span>10 Metres carres</span> </h4>
                                            <h4 class="list-group-item-heading">Delai d'echange:<span>10 Metres carres</span> </h4>
                                            <h4 class="list-group-item-heading"> Delai de logistique:<span>10 Metres carres</span> </h4>
                                        </a>
                                    </div>

                                </div>

                                <div class="rotation-block flex-control-btn-box">
                                    <a class="blue-btn-rotate" id="rotatresult" href="#" style="color:#000000;float:right;display:none;"><span class="glyphicon glyphicon-repeat"></span>
                                        <span class="glyphicon-class">Rotation</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content -->
    </div><!-- container -->


    <script type="text/javascript">
        $(document).ready(function() {
            
            localStorage.removeItem('border_tile');
            localStorage.removeItem('tile');
            
            $(".checkuni").hide();
            $("#current-color").hide();
            $(".concept").hide();
            $(".rg-image-wrapper").hide();

            $(document).on('click', '.category_list', function(){
                // alert($(this).attr('data-category_id'))
                $.ajax({
                    url: 'clear_session_data.php',
                    type: 'POST',
                    data: {},
                    success: function(res){}
                });

                $.ajax({
                    url: 'get_subcats.php',
                    type: 'POST',
                    data: {
                        "category": $(this).attr('data-category_id'),
                    },
                    success: function(res){
                        res = JSON.parse(res);
                        $('.motif-label-box').empty()
                        $('.motif-label-box').append(res)
                        $(".es-carousel").hide();
                    },
                    error: function(res){
                        console.log(res)
                    }
                })
            });

            $(document).on('click', '.sub-nav-link', function() {
                $.ajax({
                    url: 'clear_session_data.php',
                    type: 'POST',
                    data: {},
                    success: function(res){}
                });

                var cat = $(this).attr('data-cat');
                var subcat = $(this).attr('data-subcat');
                let $this = $(this);

                $.ajax({
                    type: "POST",
                    url: 'getMotifs.php',
                    data: {
                        "category": cat,
                        "subCategory": subcat
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (!res.error) {
                            $('.sub-nav-link').each(function(){
                                if($(this).hasClass('sub-nav-active')){
                                    $(this).removeClass('sub-nav-active')
                                }
                            })
                            $this.addClass('sub-nav-active');
                            $(".es-carousel ul").empty();
                            $(".es-carousel ul").append(res);
                            $("#result").show();
                            $("#resultborder").hide();
                            $(".concept").hide();
                            $(".rg-image-wrapper").hide();
                            $(".es-carousel-wrapper").show();
                            $("#current-color").hide();
                            $(".es-carousel").show();
                            $(".es-carousel").mCustomScrollbar({
                                theme: "dark",
                                axis: "y",
                                scrollButtons: {
                                    enable: true
                                }
                            });
                            return false;
                        } else {
                            alert("No Image Found");
                        }
                    }
                });
            });

            $(".email_form").on("submit", function(e) {
                e.preventDefault(); // Prevent browser default submit.
                let formData = new FormData(this);
                formData.append('inner_img', $('.email_form .inner_image').attr('src'))
                formData.append('border_img', $('.email_form .border_image').attr('src'))
                formData.append('output', $('.email_form #devis-wrap').html())
                $.ajax({
                    url: "submitform.php",
                    type: "POST",
                    data: formData,
                    success: function (res) {
                        alert("Your response has been submitted successfully.")
                        res = JSON.parse(res);
                        if('success' in res){
                            $('#DevisModal').modal('toggle');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $("#devis").on('click', function(e){
                $.ajax({
                    url: "get_session_data.php",
                    type: "POST",
                    data: {},
                    success: function (res) {
                        res = JSON.parse(res)
                        const { inner_image, border_image, default_image, inner_name, border_name } = res
                        if(inner_image){
                            $('.inner_image').attr('src', inner_image);
                            $('.pattern_name').html(localStorage.getItem('tile'));
                        }
                        else{
                            $('.inner_image').attr('src', default_image);
                        }
                        if(border_image){
                            $('.border_image').attr('src', border_image);
                            $('.border_name').html(localStorage.getItem('border_tile'));
                        }
                        else{
                            $('.border_image').attr('src', default_image);
                        }
                        let table = $('#table-wrap').html()
                        $('#DevisModal #devis-wrap').html(table)
                        $('#DevisModal #devis-wrap img').addClass('hsn_css')
                    },
                });
            });

            $('#search-bar').on('keyup', function(){
                let input = $(this).val()
                $.ajax({
                    url: "search_image.php",
                    type: "POST",
                    data: { input },
                    success: function(res){
                        res = JSON.parse(res)
                        console.log(res)
                        // $(".es-carousel").removeAttr('style');
                        $(".es-carousel").css('display', 'block')
                        $(".es-carousel-wrapper").css('display', 'block')
                        $(".concept").css('display', 'none')
                        $(".rg-image-wrapper").css('display', 'none')
                        $(".motif-label-box").empty()
                        $(".es-carousel ul").empty()
                        $(".es-carousel ul").append(res)
                    },
                });
            });

            $('#color-motif').on('click', function(){
                $('.cme').each(function(){
                    if($(this).hasClass('colordiv-border')){
                        $(this).removeClass('colordiv-border')
                    }
                })
                let color = $($('.cme').last()[0]).addClass('colordiv-border');
            });

            $('.category_list').on('click', function(){
                $("#rotatresult").css('display', 'none')
                $(".concept").css('display', 'none')
                $(".rg-image-wrapper").css('display', 'none')
            })

            $(document).on('click', '#selfcolor .cme', function(){
                // console.log($(this)[0]);
                $('.cme').each(function(){
                    if($(this).hasClass('colordiv-border')){
                        $(this).removeClass('colordiv-border')
                    }
                })
                let color = $($(this)[0]).addClass('colordiv-border');
            });

            function getImages(category, subCategory) {
                console.log(category, subCategory);
            }

            $(".noscouleurs").live("click", function(e) {
                $(".checkuni").show();
                $(".helpcolor").hide();
                $("#resultborder").hide();
                $("#result").hide();
                $(".ccommtitre").show();
                $("#colorforuni").show();
                $("#color-motif").hide();
                $(".ccomm").hide();
                $("#selfcolor").hide();
                $("#color-palette-interior-comm").show();
                $("#refb").hide();
                $("#refp").hide();
                $(".concept").show();
                $(".rg-image-wrapper").show();
                $(".es-carousel-wrapper").hide();
                $("#current-color").hide();
                $('#current-colorref').hide();
                $(".colorresult").hide();
                $(".colorresultborder").hide();
                $('.enstok').empty();
                $(".ccommtitre").hide();
                $(".enstok").empty();
                $(".enstok").hide();
                $("#color-palette-interior").show();
                $(".ccommtitre").show();
                $(".rg-gallery").show();
                $("#colorforuni").show();
                $("#color-motif").hide();
                $(".ccomm").hide();
                e.preventDefault();
            });


            $("#main-menu  li a").click(function(e) {
                $("#validecolor").hide();
                $("#txtvalidate").hide();
                $(".txtocto").hide();

                a = false;
                if (!$(this).hasClass('artiste')) {
                    a = false;

                } else {
                    a = true;
                    $("#result").removeClass("artiste");

                }
                if (!$(this).hasClass('bordure') && !$(this).hasClass('parentcl') && !$(this).hasClass('noscouleurs') && !$(this).hasClass('octogones')) {

                    $("#rotatresult").show();
                    $(".checkuni").hide();
                    $(".es-carousel ul").empty();
                    $("#colname").empty();
                    $("#colname").append($(this).html());
                    var id = $(this).attr('id');

                    // 	$.ajax({
                    // 	      type: "GET",
                    // 	      url: 'getMotifs.php',
                    // 	      data: 'motif=data/'+id,
                    // 	      success: function (res) {

                    // $(".es-carousel ul").append(res)	;
                    // $( "#result" ).show(  );
                    // $( "#resultborder" ).hide(  );
                    // $( ".concept" ).hide(  );
                    // $( ".rg-image-wrapper" ).hide( );
                    // $( ".es-carousel-wrapper" ).show(  );
                    // $("#current-color").hide(  );
                    // $(".es-carousel").show();
                    // 	      }
                    // 	 });
                } else {
                    $("#rotatresult").hide();
                }
                if (a) {
                    $(".colorresultborder").hide();
                    $(".colorresult").hide();
                }
                e.preventDefault();
            });

            $("#searchsub").click(function(e) {
                name = $("#search").val();
                $.ajax({
                    type: "GET",
                    url: 'search.php',
                    data: "name=" + name,
                    success: function(res) {
                        $(".titlem").empty().append("Resultat");
                        $(".es-carousel ul").empty().append(res);
                        $(".concept").hide();
                        $(".rg-image-wrapper").hide();
                        $(".es-carousel-wrapper").show();
                        $("#current-color").hide();
                        $(".es-carousel").show();
                    }
                });
                e.preventDefault();
            });

            $(".ccomm").click(function(e) {
                $(".helpcolor").empty().append("<?php $translate->__('Cliquer sur la couleur choisie,puis positionner le curseur a l endroit ou vous souhaitez changer la couleur dans le carreau'); ?> ");
                $(".helpcolor").show();
                $("#current-color").show();
                $('#current-colorref').show();
                $("#selfcolor").show();
                $(".enstok").empty();
                $(".enstok").hide();
                $("#color-palette-interior").show();
                $(".ccommtitre").show();
                $(".rg-gallery").show();
                if ($(".es-carousel ul li").hasClass('unis')) {
                    $("#colorforuni").show();
                    $("#color-motif").hide();
                } else {
                    $("#colorforuni").hide();
                    $("#color-motif").show();
                }
                $(this).hide();
                e.preventDefault();
            });

            $(".bordure").click(function(e) {
                $(".checkuni").hide();
                $(".es-carousel ul").empty();
                $("#colname").empty();
                $("#colname").append($(this).html());
                var id = $(this).attr('id');

                $.ajax({
                    type: "GET",
                    url: 'getBorder.php',
                    success: function(res) {
                        $(".es-carousel ul").append(res);
                        $("#result").hide();
                        $("#resultborder").show();
                        $(".concept").hide();
                        $(".rg-image-wrapper").hide();
                        $(".es-carousel-wrapper").show();
                        $("#current-color").hide();
                        $(".es-carousel").show();
                    }
                });
                e.preventDefault();
            });

            $("#rotatresult").live('click', function(e) {
                // alert($(this).attr('data-catee_name'))
                // alert($("#result").attr("src"))
                let cat_name = $(this).attr('data-catee_name')
                $.ajax({
                    type: "GET",
                    url: 'uniquename.php',
                    data: "img=" + $("#result").attr("src"),
                    success: function(res) {
                        $.ajax({
                            type: "GET",
                            url: 'rotation.php',
                            data: "img=" + $("#result").attr("src") + "&name=" + res,
                            success: function(res2) {
                                $("#result").attr("src", "tmp/" + res + ".png");
                                $.ajax({
                                    type: "GET",
                                    url: 'pasteImage.php',
                                    data: 'img=tmp/' + res + '.png' + '&cat_name=' + cat_name + '&format=' + $('.flex-shape-box input:checked').siblings('label').find('p').text(),
                                    success: function(result) {
                                        result = JSON.parse(result);
                                        $(".compic").removeAttr('table');
                                        document.getElementById("table-wrap").innerHTML = result;
                                        document.getElementById("devis-wrap").innerHTML = result;
                                        document.getElementById("3dbox").innerHTML = result;
                                        $('#3dbox img').css('width', '');
                                        $('#3dbox img').css('width', '100%');
                                    }
                                });
                            }
                        });
                    }
                });
                e.preventDefault();
            });


            $(".octogones").live('click', function(e) {
                $(".txtocto").show();
                $(".checkuni").hide();
                $(".helpcolor").empty().append("<?php $translate->__('Octogones'); ?>");
                $('.helpcolor').show();
                $("#result").removeClass("cun");
                $(".colorresult").empty();
                $(".colorresultborder").empty();
                $("#result").attr('src', '');
                $("#result").attr('alt', '');
                $("#result").show();
                $("#resultborder").hide();
                $('.enstok').show();
                $("#color-palette-interior").show();
                $(".ccommtitre").hide();
                $(".ccomm").hide();
                $("#color-palette-interior-comm").hide();
                $("#colorforuni").hide();
                $("#color-motif").show();
                $(".rg-caption p").empty();
                $(".rg-caption p").append($(this).children("img").attr("alt"));
                str = $(".rg-caption p").text();
                rep = str.replace(".png", "");
                $("#refp").empty().append(rep.replace(".PNG", ""));
                $("#refp").show();
                $("#refb").hide();
                $(".concept").show();;
                $(".rg-image-wrapper").show();
                $(".es-carousel-wrapper").hide();;
                $("#current-color").show();;
                $(".enstok").empty();
                $(".compic").attr('src', "moz.php?img=" + $("#result").attr("src") + "&imgborder=" + $("#resultborder").attr("src") + "&param=art");
                $(".colorresult").empty();

                if (!$(this).hasClass('artiste')) {
                    $(".ccomm").hide();
                    $.ajax({
                        type: "GET",
                        url: 'getCodeColor.php',
                        data: 'img=' + $("#result").attr("src"),
                        success: function(result) {
                            $(".colorresult").show();
                            $(".colorresultborder").hide();
                        }
                    });
                } else {
                    $(".ccomm").hide();
                }

                $.ajax({
                    type: "GET",
                    url: 'getItem.php',
                    data: 'name=M606.png&tom=tom',
                    success: function(res) {
                        $(".enstok").prepend(res);
                    }
                });
                e.preventDefault();
            });

            //Here
            $(".es-carousel ul li a").live('click', function(e) {
                // alert($(this).next().text());
                if($(this).find('img').data('cat_name') == 'Bordure'){
                    localStorage.setItem('border_tile', $(this).next().text());
                }
                else{
                    localStorage.setItem('tile', $(this).next().text());
                }
                var $this = $(this);
                if($(this).find('img').data('cat_name') != 'Bordure' && $(this).find('img').data('cat_name') != 'Hexagonal'){
                    $('#rotatresult').css('display', '');
                    $("#result_corner").hide();
                }
                else{
                    $("#result_corner").show();
                    var img = $(this).find('img').attr('data-img_id');
                    $.ajax({
                        url: 'get_corner_image.php',
                        type: 'POST',
                        data: {
                            'img': img,
                        },
                        success: function(res){
                            let corner_tl = JSON.parse(res)
                            $("#result_corner").attr('src', corner_tl);
                            $("#result_corner").attr('data-cate_name', $this.find('img').data('cat_name'));
                            $("#result_corner").attr('data-img_id', $this.find('img').data('img_id'));
                        }
                    });
                }


                $('#pop1').attr('disabled', false);
                $('#imprimer').attr('disabled', false);

                $("#result").removeClass("cun");
                $("#result_corner").removeClass("cun");
                if (!$(this).hasClass('borderhref')) {
                    $("#result").show();
                    $("#resultborder").hide();
                    $('.enstok').show();
                    $("#color-palette-interior").hide();
                    $(".ccommtitre").hide();
                    $(".ccomm").show();
                    if ($(this).hasClass('unis')) {
                        $("#color-palette-interior-comm").show();
                    } else {
                        $("#color-palette-interior-comm").hide();
                    }
                    $("#result").attr('src', $(this).children("img").attr("src"));
                    $("#result").attr('alt', $(this).children("img").attr("alt"));
                    $("#result").attr('data-cate_name', $(this).find('img').data('cat_name'));
                    $("#result").attr('data-img_id', $(this).find('img').data('img_id'));
                    $("#result").attr('data-is_symmetric', $(this).find('img').data('is_symmetric'));

                    $("#rotatresult").attr('data-catee_name', $(this).find('img').data('cat_name'));
                    $(".rg-caption p").empty();
                    $(".rg-caption p").append($(this).children("img").attr("alt"));
                    str = $(".rg-caption p").text();
                    rep = str.replace(".png", "");
                    $("#refp").empty().append(rep.replace(".PNG", ""));
                    $("#refp").show();
                    $("#refb").hide();

                    $(".concept").slideToggle("slow");
                    $(".rg-image-wrapper").slideToggle("slow");
                    $(".es-carousel-wrapper").slideToggle("slow");
                    $("#current-color").slideToggle("slow");

                    $(".enstok").empty();

                    if ($(this).hasClass('artiste')) {
                        $("#result").addClass("artiste");
                        $(".compic").attr('src', $("#result").attr("src"));
                    } else {
                        $("#result").removeClass("artiste");
                    }

                    if ($(this).hasClass('hex')) {
                        $("#rotatresult").hide();
                        $("#result").addClass("hex");
                        $(".compic").attr('src', $("#result").attr("src"));
                    } else {
                        $("#result").removeClass("hex");
                    }

                    if ($(this).hasClass('f14')) {

                        $(".bordure").hide();
                        $("#result").addClass("f14");
                        $(".compic").attr('src', $("#result").attr("src"));
                    } else {
                        $("#result").removeClass("f14");
                        $(".bordure").show();
                    }

                    if (!$(this).hasClass('f14') && !$(this).hasClass('artiste') && !$(this).hasClass('hex')) {
                        $.ajax({
                            type: "GET",
                            url: 'pasteImage.php',
                            data: 'img=' + $("#result").attr("src") + '&cat_name=' + $(this).find('img').data('cat_name') + '&format=' + $('.flex-shape-box input:checked').siblings('label').find('p').text() + '&img_id=' + $(this).find('img').data('img_id') + '&is_symmetric=' + $(this).find('img').data('is_symmetric'),
                            success: function(result) {
                                result = JSON.parse(result);
                                $(".compic").removeAttr('src');
                                document.getElementById("table-wrap").innerHTML = result;
                                document.getElementById("devis-wrap").innerHTML = result;
                                document.getElementById("3dbox").innerHTML = result;
                                $('#3dbox img').css('width', '');
                                $('#3dbox img').css('width', '100%');
                                $("#devis").attr('disabled', false);
                            }
                        });
                    }

                    $(".colorresult").empty();
                    if (!$(this).hasClass('artiste')) {
                        $(".ccomm").show();
                        $.ajax({
                            type: "GET",
                            url: 'getCodeColor.php',
                            data: 'img=' + $("#result").attr("src"),
                            success: function(result) {
                                $(".colorresult").empty().prepend("<h4><?php $translate->__('References unis'); ?></h4>" + result);
                                $(".colorresult").show();
                                $(".colorresultborder").hide();
                            }
                        });
                    } else {
                        $(".ccomm").hide();
                    }
                    $.ajax({
                        type: "GET",
                        url: 'getItem.php',
                        data: 'name=' + $(".rg-caption p").text(),
                        success: function(res) {

                            $(".enstok").prepend(res);
                        }
                    });
                }
                e.preventDefault();
            });

            $(".borderhref").live('click', function(e) {
                $("#rotatresult").hide();
                $("#resultborder").removeClass("cun");
                $('.enstok').show();
                $(".colorresultborder").empty();
                $("#color-palette-interior").hide();
                $(".ccommtitre").hide();
                $(".ccomm").show();
                $("#result").hide();
                $("#resultborder").show();
                $("#resultborder").attr('src', $(this).children("img").attr("src"));
                $("#resultborder").attr('alt', $(this).children("img").attr("alt"));
                stra = $(this).children("img").attr("src");
                ang = stra.replace(".png", "C.png");
                $("#ang").attr('src', ang.replace("Bordure", "Bordure/contour"));
                $(".rg-caption p").empty();
                $(".rg-caption p").append($(this).children("img").attr("alt"));
                $(".concept").slideToggle("slow");
                str = $(".rg-caption p").text();
                rep = str.replace(".png", "");
                $("#refp").hide();
                $("#refb").empty().append(rep.replace(".PNG", ""));
                $("#refb").show();
                $(".rg-image-wrapper").slideToggle("slow");
                $(".es-carousel-wrapper").slideToggle("slow");
                $("#current-color").slideToggle("slow");
                if ($(this).hasClass('artiste')) {
                    $("#resultborder").addClass("artiste");
                } else {
                    $("#resultborder").removeClass("artiste");
                }

                $(".compic").attr('src', $("#result").attr("src"));
                $(".colorresultborder").empty();
                if (!$(this).hasClass('artiste')) {
                    $(".ccomm").show();
                    $.ajax({
                        type: "GET",
                        url: 'getCodeColor.php',
                        data: 'img=' + $("#resultborder").attr("src"),
                        success: function(result) {
                            $(".colorresultborder").empty().prepend("<h4><?php $translate->__('References unis'); ?></h4>" + result);
                            $(".colorresult").hide();
                            $(".colorresultborder").show();
                        }
                    });
                } else {
                    $(".ccomm").hide();
                }
                $.ajax({
                    type: "GET",
                    url: 'getItemb.php',
                    data: 'name=' + $(".rg-caption p").text(),
                    success: function(res) {
                        $(".enstok").empty().prepend(res);
                    }
                });
                e.preventDefault();
            });

            $(".itm").live('click', function(e) {
                ast = false;;
                $("#result").removeClass("cun");
                $(".colorresult").empty();
                $(".colorresultborder").empty();
                $("#result").show();
                $("#resultborder").hide();
                org = $("#result").attr("src");
                orgalt = $("#result").attr("alt");
                itmalt = $(this).children("img").attr("alt");
                itm = $(this).children("img").attr("src");


                if ((itm.indexOf("M600.") > -1) || (itm.indexOf("M601.") > -1) || (itm.indexOf("M602.") > -1) || (itm.indexOf("M603.") > -1) || (itm.indexOf("M604.") > -1)) {
                    itm2 = itm.replace("all", "Octogones/tomette");
                    itm3 = itm2.replace(".png", "octo.png");
                    $("#result").attr("src", itm3);
                } else {
                    $("#result").attr("src", itm);
                }

                $("#result").attr("alt", itmalt);
                if ((itm.indexOf("M600.") > -1) || (itm.indexOf("M601.") > -1) || (itm.indexOf("M602.") > -1) || (itm.indexOf("M603.") > -1) || (itm.indexOf("M604.") > -1)) {

                } else {
                    $(this).children("img").attr("src", org);
                    $(this).children("img").attr("alt", orgalt);
                }

                $(".rg-caption p").empty().append(itmalt);
                str = $(".rg-caption p").text();
                rep = str.replace(".png", "");
                $("#refp").empty().append(rep.replace(".PNG", ""));
                $("#refp").show();
                $("#refb").hide();
                $(".colorresult").empty();
                if (!$(this).hasClass('artiste')) {
                    if (!$(this).hasClass('octo')) {
                        if ((itm.indexOf("M600.") > -1) || (itm.indexOf("M601.") > -1) || (itm.indexOf("M602.") > -1) || (itm.indexOf("M603.") > -1) || (itm.indexOf("M604.") > -1)) {
                            $(".ccomm").hide();
                        } else {
                            $(".ccomm").show();
                        }
                    } else {
                        ast = true;
                        $(".ccomm").hide();
                    }
                    $.ajax({
                        type: "GET",
                        url: 'getCodeColor.php',
                        data: 'img=' + $("#result").attr("src"),
                        success: function(result) {
                            if (ast) {} else {
                                $(".colorresult").empty().prepend(result);
                            }
                            $(".colorresult").show();
                            $(".colorresultborder").hide();
                        }
                    });
                } else {
                    $(".ccomm").hide();
                }
                if ($(this).hasClass('hex')) {
                    $("#result").addClass("hex");
                    $(".compic").attr('src', $("#result").attr("src"));
                } else {
                    $("#result").removeClass("hex");
                }
                if ($(this).hasClass('f14')) {
                    $("#result").addClass("f14");
                    $(".compic").attr('src', $("#result").attr("src"));
                } else {
                    $("#result").removeClass("f14");
                }
                if (!$(this).hasClass('f14') && !$(this).hasClass('hex')) {
                    $(".compic").attr('src', $("#result").attr("src"));
                }
                e.preventDefault();
            });

            $(".itmb").live('click', function(e) {
                $("#resultborder").removeClass("cun");
                $(".colorresult").empty();
                $(".colorresultborder").empty();
                $("#result").hide();
                $("#resultborder").show();

                org = $("#resultborder").attr("src");
                orgalt = $("#resultborder").attr("alt");
                itmalt = $(this).children("img").attr("alt");
                itm = $(this).children("img").attr("src");
                $("#resultborder").attr("src", itm);
                $("#resultborder").attr("alt", itmalt);
                $(this).children("img").attr("src", org);
                $(this).children("img").attr("alt", orgalt);
                $(".rg-caption p").empty().append(itmalt);
                str = $(".rg-caption p").text();
                rep = str.replace(".png", "");


                ang = itm.replace(".png", "C.png");

                $("#ang").attr('src', ang.replace("all", "Bordure/contour"));

                $("#refb").empty().append(rep.replace(".PNG", ""));
                $("#refb").show();
                $("#refp").hide();
                $(".colorresultborder").empty();
                if (!$(this).hasClass('artiste')) {
                    $(".ccomm").show();
                    $.ajax({
                        type: "GET",
                        url: 'getCodeColor.php',
                        data: 'img=' + $("#resultborder").attr("src"),
                        success: function(result) {
                            $(".colorresultborder").empty().prepend("<h4><?php $translate->__('References unis'); ?></h4>" + result);
                            $(".colorresult").hide();
                            $(".colorresultborder").show();
                        }
                    });
                } else {
                    $(".ccomm").hide();
                }
                $(".compic").attr('src', $("#result").attr("src"));
                e.preventDefault();
            });

            $("#pop1").live('click', function(e) {
                $("#3dbox").attr('src', $(".compic").attr('src'));
                return false;
            });

            $("#pop2").live('click', function() {
                $("#3d1").attr('src', $(".compic").attr('src'));
                $("#3d2").attr('src', $(".compic").attr('src'));
                $("#3d3").attr('src', $(".compic").attr('src'));
                return false;
            });

            /*$("#devis").live('click', function(e) {
                $("#motifimg").attr('src', $("#result").attr('src'));
                $("#borderimg").attr('src', $("#resultborder").attr('src'));
                var colorresult = $(".colorresult").html();
                var res = colorresult.replace("<?php $translate->__('References unis'); ?>", "");
                var res2 = res.replace("U", "U");
                var colorresultborder = $(".colorresultborder").html();
                var res3 = colorresultborder.replace("<?php $translate->__('References unis'); ?>", "");
                var res4 = res3.replace("U", "U");
                if ($("#refp").text() == $(".colorresult").text()) {
                    $("#motifr").html($("#refp").text());
                } else {
                    //Come here
                    $("#motifr").html($("#refp").text() + " " + res2);
                }
                var src = $("#result").attr("src");
                if (src.length != 0) {
                    $("#borderimg").remove();
                    $.ajax({
                        type: "GET",
                        url: 'pasteImage.php',
                        data: 'img=' + $("#result").attr("src"),
                        success: function(result) {
                            result = JSON.parse(result);
                            $("#borderr").removeAttr('img');
                            document.getElementById("borderr").innerHTML = result;
                        }
                    });
                }
                e.preventDefault();
            });*/



            $(".cme").live("click", function(e) {
                $('#current-color').css("background-color", $(this).css("background-color"));
                $('#current-colorref').empty().append($(this).attr("original-title"));

                e.preventDefault();
            });

            $(".palette-color").click(function(e) {



                title = $(this).attr("original-title");
                $('#current-color').css("background-color", $(this).css("background-color"));
                $('#current-colorref').empty().append($(this).attr("original-title"));
                $('#selfcolor div').each(function(i, elm) {
                    if ($(elm).css("background-color") == $('#current-color').css("background-color")) {
                        $(elm).remove();
                    }
                }).promise().done(function() {
                    $('#selfcolor').append('<div original-title="' + title + '" class="cme" style="background-color:' + $('#current-color').css("background-color") + '; display: inline; width:30px;height:30px;float:left;"></div>');
                });
                if (!$(this).hasClass('cuz')) {
                    $("#selfcolor").show();
                }
                e.preventDefault();
            });


            $('.cuz').live('click', function(e) {
                $("#contouruni").attr('checked');
                $("#interieuruni").attr('checked');

                title = $(this).attr("original-title");
                unis = "getcu.php?color=" + hexu($(this).css("background-color"));
                if ($("#contouruni").attr('checked') && $("#interieuruni").attr('checked')) {

                    $("#resultborder").hide();
                    $("#result").show();
                    $("#result").attr("src", unis);
                    $("#refb").empty().append(title);
                    $("#refb").show();
                    $("#refp").empty().append(title);
                    $("#refp").hide();
                    if (!$("#result").hasClass('cun')) {
                        $("#result").addClass("cun");
                    }
                    if (!$("#resultborder").hasClass('cun')) {
                        $("#resultborder").addClass("cun");
                    }
                    $("#resultborder").attr("src", unis);
                    $("#ang").attr("src", unis);
                    // $(".compic").attr('src',"moz.php?imgborder="+unis+"&img="+unis);
                } else if (!($("#interieuruni").attr('checked')) && $("#contouruni").attr('checked')) {

                    $("#refp").hide();
                    $("#refb").empty().append(title);
                    $("#refb").show();
                    $(".colorresult").hide();
                    $(".colorresultborder").empty().append(title);
                    $(".colorresultborder").hide();

                    $("#resultborder").attr("src", unis);
                    $("#ang").attr("src", unis);
                    $("#resultborder").show();
                    $("#result").hide();
                    $("#resultborder").attr("src", unis);
                    $("#ang").attr("src", unis);

                    if (!$("#resultborder").hasClass('cun')) {
                        $("#resultborder").addClass("cun");
                    }

                    if ($("#result").hasClass('hex')) {
                        $(".compic").attr('src', $("#result").attr("src"));
                    } else {
                        $("#result").removeClass("hex");
                    }
                    if ($("#result").hasClass('f14')) {
                        $(".compic").attr('src', $("#result").attr("src"));
                    }
                    if (!$("#result").hasClass('f14') && !$("#result").hasClass('artiste') && !$("#result").hasClass('hex')) {

                        $(".compic").attr('src', $("#result").attr("src"));

                    }


                } else if ($("#interieuruni").attr('checked') && !($("#contouruni").attr('checked'))) {


                    $("#refb").hide();
                    $("#refp").empty().append(title);
                    $("#refp").show();

                    $(".colorresultborder").hide();
                    $(".colorresult").empty().append(title);
                    $(".colorresult").hide();
                    $("#result").attr("src", unis);
                    $("#resultborder").hide();
                    $("#result").show();
                    if (!$("#result").hasClass('cun')) {
                        $("#result").addClass("cun");
                    }
                    $("#result").attr("src", unis);
                    $(".compic").attr('src', "moz.php?imgborder=" + $("#resultborder").attr("src") + "&img=" + unis);
                } else {
                    alert("Veuillez selectionner un type de remplissage countour,interieur ou bien les deux !");
                }


            });

            $('#resultborder').live('click', function(e) {
                if (!$(this).hasClass('artiste')) {
                    // $('.rg-loading').css('display', 'block');
                    rs = hexc($('#current-color').css("background-color"));
                    sr = $("#resultborder").attr('src');
                    ang = $("#ang").attr('src');
                    rs = rs.replace("#", "");
                    pos = getMousePos(e, getOrigin(document.getElementById('resultborder')));

                    $.ajax({
                        type: "GET",
                        url: 'getColorBorder.php',
                        data: 'coords=' + pos + '&range=1&img=' + sr + '&color=' + rs + '&ang=' + ang,
                        success: function(res) {
                            path = "tmp/" + pos[0] + pos[1] + ".png";
                            angpath = "tmp/" + pos[0] + pos[1] + "ang.png";
                            $("#resultborder").attr('src', path);
                            $("#ang").attr('src', angpath);
                            // $('.rg-loading').css('display', 'none');
                            $(".compic").attr('src', "moz.php?imgborder=tmp/" + pos[0] + pos[1] + ".png&img=" + $("#result").attr('src'));
                            $('.enstok').hide();
                            //	$(".colorresultborder").hide();
                            $(".glyphicon-remove").text(' <?php $translate->__('supprimer'); ?>');
                            $(".colorresultborder h4").text('<?php $translate->__('Couleurs choisies'); ?>');
                            $(".colorresultborder ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: " + $('#current-color').css('background-color') + "; ' class='colorchoisiaff' ></div>" + $("#current-colorref").text() + " <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> <?php $translate->__('supprimer'); ?></span></a></li>");
                            $("#validecolor").show();
                            $("#txtvalidate").show();
                            $(".colorchoisiaff").show();
                            $(".colorchoisi").show();

                            var seen = {};
                            $('.colorresultborder ul li').each(function() {
                                var txt = $(this).text();
                                if (seen[txt])
                                    $(this).remove();
                                else
                                    seen[txt] = true;
                            });
                            //  $('#unismodalcontentborder').empty();
                            //  $( ".colorresultborder li" ).each(function( index ) {
                            //
                            //  	$('#unismodalcontentborder').append("<div style='font-size:16px;'> Avez-vous remplacer le: "+$( this ).text()+" par le "+$( "#current-colorref" ).text()+"? <button style='float:right;'  class='unischangeconfirmeborder btn btn-info btn-large btn-responsive' id='"+$( this ).text()+"'>Oui je confirme</button></div><br/><br/>");
                            //  	});
                            //  $('#unismodalborder').modal('show');
                        }
                    });

                    nm = $(".rg-caption p").text();
                    $.ajax({
                        type: "GET",
                        url: 'modname.php',
                        data: 'name=' + nm,
                        success: function(res) {
                            $(".rg-caption p").empty().append(res);
                            str = res;
                            rep = str.replace(".png", "");
                            $("#refb").empty().append(rep.replace(".PNG", ""));
                            $("#refp").hide();
                            $("#refb").show();
                        }
                    });
                }
                e.preventDefault();
            });

            $('#compsave').live('click', function(e) {
                colrm = $("#refp").text() + "-" + $(".colorresult").text();
                colrb = $("#refb").text() + "-" + $(".colorresultborder").text();
                window.location.href = "DownComp.php?img=" + $("#result").attr("src") + "&imgborder=" + $("#resultborder").attr("src") + "&colm=" + colrm + "&colb=" + colrb;
                e.preventDefault();
            });
            $('.unischangeconfirme').live('click', function(e) {
                val = $(this).attr("id");

                $(".colorresult li").each(function(index) {
                    if ($(this).text() == val) {
                        $(this).text($('#current-colorref').text());
                        $('#unismodal').modal('hide');
                    }

                });
                e.preventDefault();
            });

            $('.unischangeconfirmeborder').live('click', function(e) {
                val = $(this).attr("id");

                $(".colorresultborder li").each(function(index) {
                    if ($(this).text() == val) {
                        $(this).text($('#current-colorref').text());
                        $('#unismodalborder').modal('hide');
                    }

                });
                e.preventDefault();
            });


            $('#devisform').on('submit', function(e) {
                e.preventDefault();
                var data = $('#devisform').serialize();
                $.ajax({
                    type: "POST",
                    url: 'submitform.php',
                    data: data,
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.success) {
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                });
            });
            // $('#devissave').click(function (e) {
            // 	namprenom =$('#namprenom').val();
            // 	email =$('#email').val();
            // 	tel =$('#tel').val();
            // 	adress =$('#adress').val();
            // 	metres =$('#metres').val();
            // 	refcum =$('#refcum').val();
            // 	refcub =$('#refcub').val();
            // 	message =$('#message').val();
            // 	motifr =$('#motifr ').text();
            // 	borderr =$('#borderr').text();
            // 	motifimg =$('#motifimg').attr("src");
            // 	borderimg =$('#borderimg').attr("src");
            // 	ville=$('#ddv').val();
            // 	payes=$('#ddp').val();
            // 	cp=$('#ddcp').val();
            // 	projectType = $('#projectType').val();
            // 	if (namprenom !='' && email !='' && tel !='' && adress !='' && metres !='' && ville !='' && payes !='' && cp !='') {
            // 	ifct='' ;
            // 		$("iframe").contents().find("#files a").each(function() {
            // 	     txt = $(this).attr('href');
            // 	    if (txt!='') {
            // 	    	ifct=ifct+'QWER7'+txt;
            // 		}

            // 	}).promise().done( function(){
            // 		$.ajax({
            // 		      type: "post",
            // 		      url: "tcpdf/devis/getDevis.php",
            // 		      data: 'namprenom=' +namprenom+'&email=' +email+'&ville=' +ville+'&payes=' +payes+'&cp=' +cp+'&tel=' +tel+'&adress=' +adress+'&metres=' +metres+'&refcum=' +refcum+'&refcub=' +refcub+'&message=' +message+'&motifr=' +motifr+'&borderr=' +borderr+'&motifimg=' +motifimg+'&borderimg='+borderimg+'&ifct='+ifct+'&projectType='+projectType,
            // 		      success: function (result) {
            // 			 $('#deviscontent').modal('hide');
            // 		      }
            // 		 });
            // 		 } );;

            // 	}else{
            // 		bootbox.setDefaults({locale: "<?php echo $lang; ?>"});
            // 		bootbox.alert("Veuillez remplir les champs vides avant de continuer la demande ! ");


            // 		}

            // 	e.preventDefault();
            // });

            $('.close2d').live('click', function(e) {

                $('#2dcontt').modal('hide');
            });
            $('#result').live('click', function(e) {

                if (!$(this).hasClass('artiste')) {
                    rs = hexc($('#current-color').css("background-color"));
                    sr = $("#result").attr('src');
                    cat_name = $("#result").attr('data-cate_name');
                    img_id   = $("#result").attr('data-img_id');
                    is_symmetric   = $("#result").attr('data-is_symmetric');
                    rs = rs.replace("#", "");
                    pos = getMousePos(e, getOrigin(document.getElementById('result')));
                    if ($("#result").hasClass('hex')) {
                        $.ajax({
                            type: "GET",
                            url: 'getColor.php',
                            data: 'coords=' + pos + '&range=1&img=' + sr + '&color=' + rs + '&hex=hex',
                            success: function(res) {
                                $(".compic").attr('src', "moz.php?img=tmp/" + res + "hex.png&imgborder=" + $("#resultborder").attr('src') + "&param=hex");
                                path = "tmp/" + res + "poly.png";

                                let data = JSON.parse(res);
                                let img = '';
                                let corner_img = '';
                                if(data.status == 'border'){
                                    img = 'tmp/' + data.border_image + '.png';
                                    corner_img = 'tmp/' + data.corner_image + '.png';
                                }
                                else{
                                    img = 'tmp/' + data.image + '.png';
                                }

                                $("#result").attr('src', img);
                                //$('.rg-loading').css('display','none');
                                $('.enstok').hide();
                                $(".colorresult h4").text('<?php $translate->__('Couleurs choisies'); ?>');
                                $(".glyphicon-remove").text(' <?php $translate->__('supprimer'); ?>');
                                $(".colorresult ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: " + $('#current-color').css('background-color') + "; ' class='colorchoisiaff' ></div>" + $("#current-colorref").text() + " <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> <?php $translate->__('supprimer'); ?></span></a></li>");
                                $("#validecolor").show();
                                $("#txtvalidate").show();
                                $(".colorchoisiaff").show();
                                $(".colorchoisi").show();
                                var seen = {};
                                $('.colorresult ul li').each(function() {
                                    var txt = $(this).text();
                                    if (seen[txt])
                                        $(this).remove();
                                    else
                                        seen[txt] = true;
                                });
                            }
                        });
                    } else {
                        // (Paste Image Ajax) - When color is change
                        $.ajax({
                            type: "GET",
                            url: 'getColor.php',
                            data: 'coords=' + pos + '&range=1&img=' + sr + '&color=' + rs + '&category=' + cat_name + '&corner=no',
                            success: function(res) {
                                let data = JSON.parse(res);
                                console.log(data);
                                let img = '';
                                let corner_img = '';
                                if(data.status == 'border'){
                                    img = 'tmp/' + data.image + '.png';
                                    corner_img = $("#result_corner").attr('src');
                                }
                                else if(data.status == 'corner'){
                                    img = $("#result").attr('src');
                                    corner_img = 'tmp/' + data.image + '.png';
                                }
                                else{
                                    img = 'tmp/' + data.image + '.png';
                                }
                                $.ajax({
                                    type: "GET",
                                    url: 'pasteImage.php',
                                    data: 'img=' + img + '&corner_img=' + corner_img + '&cat_name=' + cat_name + '&format=' + $('.flex-shape-box input:checked').siblings('label').find('p').text() + '&img_id=' + img_id + '&is_symmetric=' + is_symmetric,
                                    success: function(result) {
                                        result = JSON.parse(result);
                                        $(".compic").removeAttr('table');
                                        document.getElementById("table-wrap").innerHTML = result;
                                        document.getElementById("devis-wrap").innerHTML = result;
                                        document.getElementById("3dbox").innerHTML = result;
                                        $('#3dbox img').css('width', '');
                                        $('#3dbox img').css('width', '100%');
                                    }
                                });
                                $(".compic").attr('src', "tmp/" + res + ".png");
                                path = "tmp/" + res + ".png";
                                $("#result").attr('src', img);
                                //$('.rg-loading').css('display','none');
                                $('.enstok').hide();
                                //$(".colorresult").hide();
                                $(".glyphicon-remove").text(' <?php $translate->__('supprimer'); ?>');
                                $(".colorresult h4").text('<?php $translate->__('Couleurs choisies'); ?>');
                                $(".colorresult ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: " + $('#current-color').css('background-color') + "; ' class='colorchoisiaff' ></div>" + $("#current-colorref").text() + " <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> <?php $translate->__('supprimer'); ?></span></a></li>");
                                $("#validecolor").show();
                                $("#txtvalidate").show();
                                $(".colorchoisiaff").show();
                                $(".colorchoisi").show();
                                var seen = {};
                                $('.colorresult ul li').each(function() {
                                    var txt = $(this).text();
                                    if (seen[txt])
                                        $(this).remove();
                                    else
                                        seen[txt] = true;
                                });
                            }
                        });
                    }

                    nm = $(".rg-caption p").text();
                    $.ajax({
                        type: "GET",
                        url: 'modname.php',
                        data: 'name=' + nm,
                        success: function(res) {
                            $(".rg-caption p").empty().append(res);
                            str = res;
                            rep = str.replace(".png", "");
                            $("#refp").empty().append(rep.replace(".PNG", ""));
                            $("#refb").hide();
                            $("#refp").show();
                        }
                    });
                } else {
                    return false;
                }
                e.preventDefault();
            });

            $('#result_corner').live('click', function(e){
                if (!$(this).hasClass('artiste')) {
                    rs = hexc($('#current-color').css("background-color"));
                    sr = $("#result_corner").attr('src');
                    cat_name = $("#result_corner").attr('data-cate_name');
                    img_id   = $("#result_corner").attr('data-img_id');
                    rs = rs.replace("#", "");
                    pos = getMousePos(e, getOrigin(document.getElementById('result_corner')));
                    if ($("#result_corner").hasClass('hex')) {
                        $.ajax({
                            type: "GET",
                            url: 'getColor.php',
                            data: 'coords=' + pos + '&range=1&img=' + sr + '&color=' + rs + '&hex=hex',
                            success: function(res) {
                                $(".compic").attr('src', "moz.php?img=tmp/" + res + "hex.png&imgborder=" + $("#resultborder").attr('src') + "&param=hex");
                                path = "tmp/" + res + "poly.png";

                                let data = JSON.parse(res);
                                let img = '';
                                let corner_img = '';
                                if(data.status == 'border'){
                                    img = 'tmp/' + data.border_image + '.png';
                                    corner_img = 'tmp/' + data.corner_image + '.png';
                                }
                                else{
                                    img = 'tmp/' + data.image + '.png';
                                }

                                $("#result").attr('src', img);
                                //$('.rg-loading').css('display','none');
                                $('.enstok').hide();
                                $(".colorresult h4").text('<?php $translate->__('Couleurs choisies'); ?>');
                                $(".glyphicon-remove").text(' <?php $translate->__('supprimer'); ?>');
                                $(".colorresult ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: " + $('#current-color').css('background-color') + "; ' class='colorchoisiaff' ></div>" + $("#current-colorref").text() + " <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> <?php $translate->__('supprimer'); ?></span></a></li>");
                                $("#validecolor").show();
                                $("#txtvalidate").show();
                                $(".colorchoisiaff").show();
                                $(".colorchoisi").show();
                                var seen = {};
                                $('.colorresult ul li').each(function() {
                                    var txt = $(this).text();
                                    if (seen[txt])
                                        $(this).remove();
                                    else
                                        seen[txt] = true;
                                });
                            }
                        });
                    } else {
                        // (Paste Image Ajax) - When color is change
                        $.ajax({
                            type: "GET",
                            url: 'getColor.php',
                            data: 'coords=' + pos + '&range=1&img=' + sr + '&color=' + rs + '&category=' + cat_name + '&corner=yes',
                            success: function(res) {
                                let data = JSON.parse(res);
                                console.log(data);
                                let img = '';
                                let corner_img = '';
                                if(data.status == 'border'){
                                    img = 'tmp/' + data.image + '.png';
                                    corner_img = $("#result_corner").attr('src');
                                }
                                else if(data.status == 'corner'){
                                    img = $("#result").attr('src');
                                    corner_img = 'tmp/' + data.image + '.png';
                                }
                                else{
                                    img = 'tmp/' + data.image + '.png';
                                }

                                $.ajax({
                                    type: "GET",
                                    url: 'pasteImage.php',
                                    data: 'img=' + img + '&corner_img=' + corner_img + '&cat_name=' + cat_name + '&format=' + $('.flex-shape-box input:checked').siblings('label').find('p').text() + '&img_id=' + img_id + '&corner=yes',
                                    success: function(result) {
                                        result = JSON.parse(result);
                                        $(".compic").removeAttr('table');
                                        document.getElementById("table-wrap").innerHTML = result;
                                        document.getElementById("devis-wrap").innerHTML = result;
                                        document.getElementById("3dbox").innerHTML = result;
                                        $('#3dbox img').css('width', '');
                                        $('#3dbox img').css('width', '100%');
                                    }
                                });
                                $(".compic").attr('src', "tmp/" + res + ".png");
                                path = "tmp/" + res + ".png";
                                $("#result_corner").attr('src', corner_img);
                                //$('.rg-loading').css('display','none');
                                $('.enstok').hide();
                                //$(".colorresult").hide();
                                $(".glyphicon-remove").text(' <?php $translate->__('supprimer'); ?>');
                                $(".colorresult h4").text('<?php $translate->__('Couleurs choisies'); ?>');
                                $(".colorresult ul").append("<li style='list-style:none;'><div style='display:none;float:left; height:20px; width:20px;background-color: " + $('#current-color').css('background-color') + "; ' class='colorchoisiaff' ></div>" + $("#current-colorref").text() + " <a href='#' class='colorchoisi' style='color:#a91c22;display:none;'><span aria-hidden='true' class='glyphicon glyphicon-remove'> <?php $translate->__('supprimer'); ?></span></a></li>");
                                $("#validecolor").show();
                                $("#txtvalidate").show();
                                $(".colorchoisiaff").show();
                                $(".colorchoisi").show();
                                var seen = {};
                                $('.colorresult ul li').each(function() {
                                    var txt = $(this).text();
                                    if (seen[txt])
                                        $(this).remove();
                                    else
                                        seen[txt] = true;
                                });
                            }
                        });
                    }

                    nm = $(".rg-caption p").text();
                    $.ajax({
                        type: "GET",
                        url: 'modname.php',
                        data: 'name=' + nm,
                        success: function(res) {
                            $(".rg-caption p").empty().append(res);
                            str = res;
                            rep = str.replace(".png", "");
                            $("#refp").empty().append(rep.replace(".PNG", ""));
                            $("#refb").hide();
                            $("#refp").show();
                        }
                    });
                } else {
                    return false;
                }
                e.preventDefault();
            });


        });
    </script>

    <script type="text/javascript">
        function getMousePos(e, relXY) {
            if (!e) var e = window.event;
            if (typeof e.pageX === 'number') return [e.pageX - relXY[0], e.pageY - relXY[1]];
            else return [e.clientX + document.body.scrollLeft +
            document.documentElement.scrollLeft - relXY[0],
                e.clientY + document.body.scrollTop +
                document.documentElement.scrollTop - relXY[1]
            ];
        }

        function getOrigin(obj) {
            var parent = box = null,
                pos = [];

            this.getStyle = function(prop) {
                if (obj.currentStyle) return obj.currentStyle[prop];
                else if (window.getComputedStyle) return
                document.defaultView.getComputedStyle(obj, null).getPropertyValue(prop);
            }

            if (obj.parentNode === null || this.getStyle('display') == 'none') return false;
            if (obj.getBoundingClientRect) { // IE
                box = obj.getBoundingClientRect();
                var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                var scrollLeft = document.documentElement.scrollLeft ||
                    document.body.scrollLeft;

                return [Math.round(box.left) + scrollLeft, Math.round(box.top) + scrollTop];
            } else if (document.getBoxObjectFor) { // gecko
                box = document.getBoxObjectFor(obj);
                pos = [box.x, box.y];
            } else { // safari/opera
                pos = [obj.offsetLeft, obj.offsetTop];
                parent = obj.offsetParent;
                if (parent != obj) {
                    while (parent) {
                        pos[0] += parent.offsetLeft;
                        pos[1] += parent.offsetTop;
                        parent = parent.offsetParent;
                    }
                }
                var ua = navigator.userAgent.toLowerCase();
                if (ua.indexOf('opera') != -1 ||
                    (ua.indexOf('safari') != -1 &&
                        this.getStyle('position') == 'absolute')) {
                    pos[1] -= document.body.offsetTop;
                };
            }
            if (obj.parentNode) parent = obj.parentNode;
            else parent = null;
            while (parent && parent.tagName != 'BODY' && parent.tagName != 'HTML') {
                pos[0] -= parent.scrollLeft;
                pos[1] -= parent.scrollTop;
                if (parent.parentNode) parent = parent.parentNode;
                else parent = null;
            }
            return pos;
        }

        function hexc(colorval) {
            var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            delete(parts[0]);
            for (var i = 1; i <= 3; ++i) {
                parts[i] = parseInt(parts[i]).toString(16);
                if (parts[i].length == 1) parts[i] = '0' + parts[i];
            }
            return color = '#' + parts.join('');
        }

        function hexu(colorval) {
            var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            delete(parts[0]);
            for (var i = 1; i <= 3; ++i) {
                parts[i] = parseInt(parts[i]).toString(16);
                if (parts[i].length == 1) parts[i] = '0' + parts[i];
            }
            return color = parts.join('');
        }

        function SaveToDisk(fileURL, fileName) {
            // for non-IE
            if (!window.ActiveXObject) {
                var save = document.createElement('a');
                save.href = fileURL;
                save.target = '_blank';
                save.download = fileName || 'unknown';

                var event = document.createEvent('Event');
                event.initEvent('click', true, true);
                save.dispatchEvent(event);
                (window.URL || window.webkitURL).revokeObjectURL(save.href);
            }

            // for IE
            else if (!!window.ActiveXObject && document.execCommand) {
                var _window = window.open(fileURL, '_blank');
                _window.document.close();
                _window.document.execCommand('SaveAs', true, fileName || fileURL)
                _window.close();
            }
        }
    </script>
    <style type="text/css">
        #main-menu {
            position: relative;
            width: auto;
        }

        #main-menu ul {
            width: 12em;
            /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
        }
    </style>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="menu/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="js/jQuery.print.js"></script>
    <script type="text/javascript" src="qtip/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="js/bootbox.js"></script>



    <!-- SmartMenus jQuery init -->
    <script type="text/javascript">
        $(function() {
            $('#main-menu').smartmenus({
                mainMenuSubOffsetX: -1,
                mainMenuSubOffsetY: 5,
                subMenusSubOffsetX: 6,
                subMenusSubOffsetY: -6

            });

            $('#result').live('mouseover', function() {
                if (!$(this).hasClass('artiste')) {
                    m = $("#current-colorref").text();
                    $(this).qtip({
                        overwrite: true,
                        content: "Colorier avec le " + m,
                        position: {
                            target: 'mouse', // Position it where the click was...
                            adjust: {
                                mouse: false
                            } // ...but don't follow the mouse
                        },
                        show: {
                            ready: true // Needed to make it show on first mouseover event
                        }
                    });
                }
            });
            $('#resultborder').live('mouseover', function() {

                $(this).qtip({
                    overwrite: true,
                    content: "Colorier avec le " + $("#current-colorref").text(),
                    position: {
                        target: 'mouse', // Position it where the click was...
                        adjust: {
                            mouse: false
                        } // ...but don't follow the mouse
                    },
                    show: {
                        ready: true // Needed to make it show on first mouseover event
                    }
                });
            });
            $('a img').live('mouseover', function() {
                sr = $(this).attr("alt");
                l = sr.replace(".png", "");
                l2 = l.replace(".PNG", "");
                $(this).qtip({
                    overwrite: false, // Make sure another tooltip can't overwrite this one without it being explicitly destroyed
                    content: l2, // comma was missing here

                    show: {
                        ready: true // Needed to make it show on first mouseover event
                    }

                });
            });


            $('#color-palette td').live('mouseover', function() {
                t = $(this).attr("original-title");
                $(this).qtip({
                    overwrite: false, // Make sure another tooltip can't overwrite this one without it being explicitly destroyed
                    content: t, // comma was missing here
                    style: {
                        classes: 'ui-tooltip-blue ui-tooltip-shadow'
                    },
                    show: {
                        ready: true // Needed to make it show on first mouseover event
                    }

                });
            });

            $('.colorchoisi').live('mouseover', function(e) {
                $(this).qtip({
                    overwrite: false, // Make sure another tooltip can't overwrite this one without it being explicitly destroyed
                    content: "<?php $translate->__('supprimer'); ?>", // comma was missing here
                    style: {
                        classes: 'ui-tooltip-blue ui-tooltip-shadow'
                    },
                    show: {
                        ready: true // Needed to make it show on first mouseover event
                    }

                });


            });
            $('#validecolor').live('click', function(e) {
                bootbox.setDefaults({
                    locale: "<?php echo $lang; ?>"
                });
                bootbox.confirm("<?php $translate->__('Confirmer ?'); ?>", function(result) {
                    if (result) {
                        $(".colorchoisiaff").hide();
                        $(".colorchoisi").hide();
                        $('#validecolor').hide();
                        $("#txtvalidate").hide();
                    }

                });

                return false;



            });
            $('.colorchoisi').live('click', function(e) {
                er = $(this).parent();
                bootbox.setDefaults({
                    locale: "<?php echo $lang; ?>"
                });
                bootbox.confirm("<?php $translate->__('Confirmer ?'); ?>", function(result) {
                    if (result) {
                        er.remove();
                    }

                });

                return false;


            });
            $('#imprimer').click(function(e) {
                $.print("#table-wrap table");

            });

            /*$(document).bind("ajaxStart", function(e) {
                $('.rg-loading').css('display', 'block');

            }).bind("ajaxStop", function(e) {
                setTimeout("$('.rg-loading').css('display','none');", 6000);
                e.preventDefault();
            });*/

        });
    </script>

    <style>
        #basicCube {
            width: 700px;
            height: 550px;
            text-align: center;
        }
    </style>

    <script>

    </script>

    <style>
        .box1 {
            -webkit-transition: all .4s ease-in-out;
        }

        .box1 .front {
            background: rgba(0, 0, 0, 0);
            border: 1px solid;
            border-color: black;
        }

        .box1 .back {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid;
            border-color: black;
        }

        .box1 .left {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid;
            border-color: black;
        }

        .box1 .right {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid;
            border-color: black;
        }

        .box1 .bottom {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid;
            border-color: black
        }

        .box1 .top {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid;
            border-color: black;
        }
    </style>

    <div class="modal bs-example-modal-lg" tabindex="-10" role="dialog" aria-labelledby="myLargeModalLabel1" aria-hidden="false" id="2dcontt">

        <div class="modal-dialog modal-lg">


            <div class="modal-content">





                <div style="perspective-origin: 0px 0px; transform-origin: 0px 0px 0px; position: absolute; top: 50%; left: 50%; margin: 0px; padding: 0px; perspective: 800px; transform: translateZ(0px); transform-style: flat;">
                    <div class="box1" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;
	transform: translate3d(0px, 0px, -800px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(0px, 0px, -800px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
	-o-transform: translate3d(0px, 0px, -800px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
	-ms-transform: translate3d(0px, 0px, -800px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
	-moz-transform: translate3d(0px, 0px, -800px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">


                        <div class="back" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;background:#fff;
	transform: translate3d(-640px, -315.5px, -600px) rotateX(0deg) rotateY(180deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(-640px, -315.5px, -600px) rotateX(0deg) rotateY(180deg) rotateZ(0deg) scale3d(1, 1, 1);
-o-transform: translate3d(-640px, -315.5px, -600px) rotateX(0deg) rotateY(180deg) rotateZ(0deg) scale3d(1, 1, 1);
-ms-transform: translate3d(-640px, -315.5px, -600px) rotateX(0deg) rotateY(180deg) rotateZ(0deg) scale3d(1, 1, 1);
-moz-transform: translate3d(-640px, -315.5px, -600px) rotateX(0deg) rotateY(180deg) rotateZ(0deg) scale3d(1, 1, 1); width: 1280px; height: 689px;"></div>

                        <div class="left" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;
	 transform: translate3d(-1440px, -344.5px, 0px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(-1440px, -344.5px, 0px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scale3d(1, 1, 1);
-o-transform: translate3d(-1440px, -344.5px, 0px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scale3d(1, 1, 1);
-ms-transform: translate3d(-1440px, -344.5px, 0px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scale3d(1, 1, 1);
-moz-transform: translate3d(-1440px, -344.5px, 0px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scale3d(1, 1, 1); width: 1600px; height: 689px;"></div>

                        <div class="right" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;
	 transform: translate3d(-160px, -344.5px, 0px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(-160px, -344.5px, 0px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scale3d(1, 1, 1);
-o-transform: translate3d(-160px, -344.5px, 0px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scale3d(1, 1, 1);
-ms-transform: translate3d(-160px, -344.5px, 0px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scale3d(1, 1, 1);
-moz-transform: translate3d(-160px, -344.5px, 0px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scale3d(1, 1, 1); width: 1600px; height: 689px;"></div>

                        <div class="bottom" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;
	transform: translate3d(-640px, -455.5px, 0px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(-640px, -455.5px, 0px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-o-transform: translate3d(-640px, -455.5px, 0px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-ms-transform: translate3d(-640px, -455.5px, 0px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-moz-transform: translate3d(-640px, -455.5px, 0px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1); width: 1280px; height: 1600px;">

<!--                            <img alt="" src="" id="3dbox" style="width: 100%; height: 100%">-->
                            <div id="3dbox" class="flex-1-box" style="width: 100%; height: 100%;"></div>
                        </div>
                        <div class="top" style="margin: 0px; padding: 0px; position: absolute; transform-style: preserve-3d;
	transform: translate3d(-640px, -1144.5px, 0px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);-webkit-transform: translate3d(-640px, -1144.5px, 0px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-o-transform: translate3d(-640px, -1144.5px, 0px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-ms-transform: translate3d(-640px, -1144.5px, 0px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);
-moz-transform: translate3d(-640px, -1144.5px, 0px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1); width: 1280px; height: 1600px;"></div>

                    </div>


                </div>



            </div>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="position:absolute;top: 0;right:0;"><?php $translate->__('Fermer'); ?></button>

    </div>

    <div class="modal fade unismodal" tabindex="-1" role="dialog" aria-labelledby="unism" aria-hidden="true" id="unismodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabele">Confirmation</h4>
                </div>
                <div id="unismodalcontent"></div>
            </div>
        </div>
    </div>

    <div class="modal fade unismodalborder" tabindex="-1" role="dialog" aria-labelledby="unism" aria-hidden="true" id="unismodalborder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabelb">Confirmation</h4>
                </div>
                <div id="unismodalcontentborder"></div>
            </div>
        </div>
    </div>

    <!--<div class="modal devis" tabindex="-1" role="dialog" aria-labelledby="Devis" aria-hidden="true" id="DevisModal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel" style=" float: right;padding-right: 2%;"><?php /*$translate->__('Demande de devis'); */?></h4>
            </div>
            <div class="modal-dialog modal-lg">
                <form class="form-horizontal" role="form" data-toggle="validator" id="devisform">
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Nom/Prenom'); */?></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="fname" id="namprenom" placeholder="<?php /*$translate->__('Nom/Prenom'); */?>" required>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" id="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Téléphone'); */?></label>
                        <div class="col-sm-10">
                            <input class="form-control" name="telephone" type="text" id="tel" placeholder="<?php /*$translate->__('Téléphone'); */?>" required>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Code postal'); */?></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="postal" id="ddcp" placeholder="<?php /*$translate->__('CP'); */?>" required>
                        </div>
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Ville'); */?></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="ddv" name="town" placeholder="<?php /*$translate->__('Ville'); */?>" required>
                        </div>
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Pays'); */?></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="ddp" name="country" placeholder="<?php /*$translate->__('Pays'); */?>" required>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Adresse'); */?></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="address" id="adress" placeholder="<?php /*$translate->__('Adresse'); */?>">
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('metres carrés M²'); */?></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="metres" name="squareM" placeholder="<?php /*$translate->__('metres carrés M²'); */?>" required>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Type de projet'); */?> </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="projectType" name="ProjectType" placeholder="<?php /*$translate->__('Type de projet'); */?>">
                        </div>
                    </div>
                    <div class="form-group form-group-lg" style="display:none;">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('References couleurs utilisées pour le motif'); */?> </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="refcum" placeholder="exp: U3,U8,U30">
                        </div>
                    </div>
                    <div class="form-group form-group-lg" style="display:none;">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('References couleurs utilisées pour le bordure'); */?> </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="refcub" placeholder="exp: U3,U8,U30">
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" cols="4" name="Message" placeholder="Message" id="message"></textarea>
                        </div>
                    </div>
                    <div id="elms" class="form-group form-group-lg">
                        <div style="display: inline;float: right;">
                            <label>Motif: </label>
                            <div id="motifr" style="width:200px;"></div>
                            <img alt="" src="" id="motifimg" width="230px" height="230px">
                        </div>
                        <div style="display: inline;float: left;">
                            <label>Bordure: </label>
                            <div id="borderr" style="width:200px;"></div>
                            <div id="imgtoremove"> <img alt="" src="" id="borderimg" width="230px" height="230px"></div>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php /*$translate->__('Ajouter un fichier'); */?></label>
                        <div class="col-sm-10" id="devisupload">
                            <iframe scrolling="auto" src="upload/basic-plus.html" width="100%" height="200px;" style="border:none;"></iframe>
                        </div>
                    </div>
                    <button type="submit" id="devissave" value="btn btn-primary btn-large" class="btn btn-primary"><?php /*$translate->__('Envoyer'); */?> </button>
                </form>
            </div>
        </div>
    </div>-->

    <div class="modal" id="DevisModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered width-box-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <form class="email_form">
                            <div class="row">
                                <div class="col-xl-12 p-0">
                                    <h1 class="text-side-form">Vos coordonnees</h1>
                                </div>
                                <div class="col-xl-4 p-0">
                                    <label for="input1" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Societe</h1>
                                        <input type="text" name="society" id="input1" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input2" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Nom*</h1>
                                        <input type="text" name="last_name" id="input2" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input3" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Prenom*</h1>
                                        <input type="text" name="first_name" id="input3" required>
                                    </label>
                                </div>

                                <div class="col-xl-12 p-0">
                                    <label for="input4" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Address*</h1>
                                        <input type="text" name="address" class="custom-90" id="input4" required>
                                    </label>
                                </div>

                                <div class="col-xl-4 p-0">
                                    <label for="input5" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Code Postal*</h1>
                                        <input type="text" name="postal_code" id="input5" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input6" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Ville*</h1>
                                        <input type="text" name="town" id="input6" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input7" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Pays*</h1>
                                        <input type="text" name="country" id="input7" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input8" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Telephone*</h1>
                                        <input type="text" name="telephone" id="input8" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input9" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Fax*</h1>
                                        <input type="text" name="fax" id="input9" required>
                                    </label>
                                </div>


                                <div class="col-xl-4 p-0">
                                    <label for="input10" class="modal-input-forms">
                                        <h1 class="common-heading-text ms-1">Email*</h1>
                                        <input type="email" name="email" id="input10" required>
                                    </label>
                                </div>



                                <div class="col-xl-12 p-0">
                                    <h1 class="text-side-form">Vos carreaux</h1>
                                </div>


                                <!--                                <div class="col-xl-12 p-0">-->
                                <!--                                </div>-->

                                <div class="col-xl-12 p-0">
                                    <div class="modal-image-box-wraper" style="margin-top: 0;">
                                        <p>Image:</p>
                                        <div id="devis-wrap" class="flex-1-box" style="margin-left: 90px;"></div>
                                    </div>
                                </div>

                                <div class="col-xl-6 p-0">
                                    <div class="modal-image-box-wraper">
                                        <p>Motif:</p>
                                        <div class="images-and-text">
                                            <div class="image-modal">
                                                <img class="inner_image" src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                            </div>
                                            <p class="pattern_name">Pattern Name</p>
                                        </div>
                                    </div>

                                    <label for="input11" class="modal-input-forms form-images-inputs">
                                        <h1 class="common-heading-text me-3">Quantite*</h1>
                                        <input class="w-100" type="text" name="pattern_amount" required id="input11">
                                    </label>
                                </div>


                                <div class="col-xl-6 p-0">
                                    <div class="modal-image-box-wraper">
                                        <p>Bordure:</p>
                                        <div class="images-and-text">
                                            <div class="image-modal">
                                                <img class="border_image" src="https://images.unsplash.com/photo-1573504816327-07f3bf7accac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dGlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                            </div>
                                            <p class="border_name">Border Name</p>
                                        </div>
                                    </div>

                                    <label for="input11" class="modal-input-forms form-images-inputs">
                                        <h1 class="common-heading-text me-3">Quantite*</h1>
                                        <input class="w-100" type="text" name="border_amount" required id="input11">
                                    </label>
                                </div>

                                <div class="col-xl-12">
                                    <label for="input12" class="modal-input-forms direction-coloumn-textarea"> 
                                        <h1 class="common-heading-text me-3">Message*</h1>
                                        <textarea class="text-area-input message"  name="message" required id="input12"></textarea>
                                    </label>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-modal-btn">
                                        <button type="submit" class="send_email">ENVOYER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</div>
</html>

<?php

function list_dir($name, $level = 2)
{
    $arr = array();
    if ($dir = opendir($name)) {
        while ($file = readdir($dir)) {

            if ($file != '.' && $file != '..') {
                array_push($arr, $file);
            }
        }
        closedir($dir);
    }
    return $arr;
}
?>



<script>
    /*document.querySelector('#Motifs').addEventListener('click', function(){
        this.classList.add('active-btn');
        document.querySelector('#Bordure').classList.remove('active-btn');
    });

    document.querySelector('#Bordure').addEventListener('click', function(){
        this.classList.add('active-btn');
        document.querySelector('#Motifs').classList.remove('active-btn');
    });*/
</script>








