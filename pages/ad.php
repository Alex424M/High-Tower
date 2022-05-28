<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Квартира на Войковской</title>
    <link rel="stylesheet" href="../css/advertisement.css">
</head>

<body>
    <div class="wrapper">
    <header class="header">
            <div class="header__container container">
                <div class="header__content">
                    <a href="../index.php" class="header__logo">High Tower</a>
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <div class="header__menu">
                        <nav class="header__nav">
                            <a href="ads.php?rent" class="nav-btn">Аренда</a>
                            <a href="ads.php?sale" class="nav-btn">Продажа</a>
                            <a href="ads.php?NewBuildings" class="nav-btn">Новостройки</a>
                            <a href="ads.php?area" class="nav-btn">Дома и участки</a>
                        </nav>
                    <?php
                    if (!isset($_SESSION['Name'])) { ?>
                        <button class="header__btn">Войти</button>
                    </div>
                    
                    <?php
                } else{
                    ?>
                    <div class="header__hi">
                        <div class="menu">
                            <button class="menu__button" type="button">
                                <span>Привет, <?php echo $_SESSION['Name'];?></span>
                            </button>
                            <ul hidden class="menu__list">
                                <li><a href="adding.php" class="menu__link">Разместить объявление</a></li>
                                <li>
                                    <form method="post" class="exit-form">
                                        <button class="menu__link" name="exit">Выйти</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        
                        <?php
                            if(isset($_POST['exit'])){
                                $_SESSION = [];
                                header('Location: index.php');
                            }
                        ?>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </header>
        <div class="announcement">
            <div class="announcement__container container">
                 <?php
                        if ($_SESSION['SelectArticle'] != -1 or isset($_GET['selectedArticle'])) { 
                            if(isset($_GET['selectedArticle'])){
                                $articleId=$_GET['selectedArticle'];
                            }elseif($_SESSION['SelectArticle']!=-1){
                                $articleId=$_SESSION['SelectArticle'];
                            }
                            $mysqli = new mysqli("127.0.0.1", "root", "", "dbhightower");
                            $query = "SELECT * FROM `announcement` WHERE ID='$articleId'";
                            if (mysqli_num_rows(mysqli_query($mysqli, $query)) > 0) {
                                $comment = mysqli_fetch_array(mysqli_query($mysqli, $query));
                                
                ?>
                <div class="announcement__navigation">
                    <a href="../index.php" class="navigation__link">Главная</a>
                    <span class="navigation__arrow">></span>
                    <a href="ads.php" class="navigation__link">Аренда</a>
                    <span class="navigation__arrow">></span>
                    <a href="ad.php" class="navigation__link"><?php echo $comment['Title'] ?></a>
                </div>
               
                <div class="announcement__row">
                    <main class="left-block">
                        <div class="left-block__row">
                            <div class="left-block__title">
                                <h1><?php echo $comment['Title'] ?></h1>
                            </div>
                            <div class="left-block__icon"><img src="../img/icons/like-heart.svg" alt=""></div>
                        </div>
                        <div class="left-block__img"><img src="data:image/jpeg;base64, <?php echo base64_encode($comment['Photo']); ?>" alt=""></div>
                        <div class="left-block__line">
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/5.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/6.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/7.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/8.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/5.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/7.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/6.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/8.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/5.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/8.png" alt="">
                                </div>
                            </div>
                            <div class="left-block__column">
                                <div class="left-block__item">
                                    <img src="../img/apartment/6.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="left-block__params params">
                            <div class="params__row">
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title"><?php echo $comment['square'] ?></div>
                                        <div class="params__subtitle">Площадь</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title"><?php echo $comment['Floor'] ?></div>
                                        <div class="params__subtitle">Этаж</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title"><?php echo $comment['totalFloor'] ?></div>
                                        <div class="params__subtitle">Этажей</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title"><?php echo $comment['ceilHeight'] ?>м</div>
                                        <div class="params__subtitle">Высота потолка</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="left-block__characteristic characteristic">
                            <div class="characteristic__title title">Характеристика</div>
                            <div class="characteristic__characteristics">
                                <ul class="characteristic-ul">
                                    <li class="characteristic-li">
                                        <span>Тип недвижимости</span>
                                        <span><?php echo $comment['typeRealty'] ?></span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Тип сделки</span>
                                        <span><?php echo $comment['transaction'] ?></span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Недвижимость</span>
                                        <span><?php echo $comment['realty'] ?></span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Высота потолков</span>
                                        <span><?php echo $comment['ceilHeight'] ?> м</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Количество комнат</span>
                                        <span><?php echo $comment['QuantityRoom'] ?></span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Площадь</span>
                                        <span><?php echo $comment['square'] ?>м</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Ремонт</span>
                                        <span><?php echo $comment['repair'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="left-block__description description">
                            <div class="description__title title">Описание</div>
                            <div class="description__text"><?php echo $comment['Description'] ?></div>
                        </div>
                        <div class="left-block__map map">
                            <div class="map__title title">Адрес</div>
                            <div class="map__addres"><?php echo $comment['address'] ?></div>
                            <div class="map__container" id="map">
                            </div>
                        </div>
                    </main>
                    <aside class="right-block">
                        <div class="right-block__price"><?php echo $comment['Cost'] ?> руб.</div>
                        <div class="right-block__costMeter">
                            <?php 
                            $costMetr = $comment['Cost']/$comment['square'];
                            echo round ($costMetr, 0);;?> руб./м
                        </div>
                        <a href="#" class="right-block__cotact">Показать контакты</a>
                        <div class="right-block__name">Компания Москва</div>
                        <div class="right-block__address"><?php echo $comment['address'] ?></div>
                        <div class="right-block__row">
                            <div class="right-block__metro">м.<?php echo $comment['Metro'] ?></div>
                            <div class="right-block__time"><?php echo $comment['foot'] ?> минут пешком</div>
                        </div>
                    </aside>
                    <?php
                            }}
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="footer__container container">
                <div class="footer__content">
                    <div class="footer__row">
                        <div class="footer__column">
                            <div class="footer__item">
                                <div class="column__title">Недвижимость</div>
                                <ul>
                                    <li><a class="item__subtitle">Аренда</a></li>
                                    <li><a class="item__subtitle">Купить</a></li>
                                    <li><a class="item__subtitle">Продать</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__column">
                            <div class="footer__item">
                                <div class="column__title">О компании</div>
                                <ul>
                                    <li><a class="item__subtitle">Email: hightower@ht.com</a></li>
                                    <li><a class="item__subtitle">Тел. +7 495 138 98 78</a></li>
                                    <li><a class="item__subtitle">Адрес г.Москва, ул Пушкина, д. 38</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer__arrow"></div>
                    <div class="conacts__row">
                        <div class="contacts__column">
                            <div class="contacts__icon"><img src="../img/icons/vk.png" alt=""></div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__icon"><img src="../img/icons/facebook.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div id="entryForm" class="modal">
        <form class="modal-content animate" method="post">
            <div class="imgcontainer">
                <span class="close" title="Close Modal">×</span>
            </div>

            <div class="container1">
                <div class="h2__enter">
                    <span class="entr">Вход </span>
                    /
                    <span class="reg  notActive">Регистрация</span>
                </div>
                <input type="text" placeholder="Email" name="Email" required>

                <input type="password" placeholder="Пароль" name="psw" required>

                <button type="submit" class="btn__submit" name="entry">Вход</button>
            </div>
        </form>
    </div>
    <div id="regForm" class="modal">
        <form class="modal-content animate" method="post">
            <div class="imgcontainer">
                <span class="close" title="Close Modal">×</span>
            </div>

            <div class="container1">
                <div class="h2__enter">
                    <span class="entr notActive">Вход </span>
                    /
                    <span class="reg">Регистрация</span>
                </div>
                <input type="text" placeholder="Имя" name="Name" required>
                <input type="text" placeholder="Email" name="Email" required>
                <input type="text" placeholder="Номер телефона" name="Number" required>

                <input type="password" placeholder="Пароль" name="psw" required>
                <input type="password" placeholder="Повторите пароль" name="psw2" required>

                <button type="submit" class="btn__submit" name="regist">Регистрация</button>
            </div>
        </form>
    </div>
    <?php
    session_start();
    if (isset($_POST['entry'])) {
        $mail = $_POST['Email'];
        $pass = $_POST['psw'];
        $key = "GDSHG4385743HGSDHdkfgjdfk4653475JSGHDJSDSKJDF476354";

        header('Content-Type: text/html; charset=utf-8');
        $link = mysqli_connect('127.0.0.1', 'root', '', 'dbhightower');


        if (!$link) die("Error");
        if (!mysqli_set_charset($link, "utf8")) {
            printf("Error loading character set utf8: %s\n", mysqli_error($link));
            exit;
        }



        if (empty($_POST['Email']) || empty($_POST['psw'])) {
            echo "<script>alert('Заполните все поля')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ad.php'>";
        } else {
            $queryHash = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
            $temp1 = mysqli_query($link, $queryHash);
            $row = mysqli_fetch_array($temp1);

            if (password_verify($pass, $row['Pass'])) {
                $nameTable = "SELECT Name FROM `users` WHERE `Mail` = '$mail'";
                $text = mysqli_fetch_array(mysqli_query($link, $nameTable));

                $_SESSION['Name'] = $text[0];
                header('Location: ad.php');
            } else {
                echo "<script>alert('Неверный логин и/или пароль')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ad.php'>";
            }
        }
    
}

if (isset($_POST['regist'])) {
    $name = $_POST['Name'];
    $mail = $_POST['Email'];
    $phone = $_POST['Number'];
    $pass = $_POST['psw'];
    $repPass = $_POST['psw2'];
    $hash = password_hash($_POST['psw'], PASSWORD_BCRYPT);
    $key = "GDSHG4385743HGSDHdkfgjdfk4653475JSGHDJSDSKJDF476354";

    // error_reporting(0);
    header('Content-Type: text/html; charset=utf-8');
    $link = mysqli_connect('127.0.0.1', 'root', '', 'dbhightower');
    if (strpos($mail, "@") !== false) {

        if (strlen($pass) > 4) {

            if ($pass == $repPass){
                if (empty($_POST['Name']) || empty($_POST['Email']) || empty($_POST['psw']) || empty($_POST['psw2']) || empty($_POST['Number'])) {
                    echo "<script>alert('Заполните все поля!')</script>";
                    echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ad.php'>";
                } else {
                    $queryMail = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
                    $tempMail = mysqli_query($link, $queryMail);
                    if (mysqli_num_rows($tempMail) > 0) {
                        echo "<script>alert('Данная почта привязана к другому аккаунту!')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ad.php'>";
                    } else {
                        $query = "INSERT INTO `users` (Name, Mail, Pass, NumberPhone) VALUE ('$name', '$mail', '$hash', '$phone')";
                        if (mysqli_query($link, $query)) {
                            echo "<script>alert('Пользователь успешно добавлен')</script>";
                            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ad.php'>";
                        } else {
                            echo "Пользователь не добавлен и за ошибки: " . mysqli_error($link);
                        }
                    }
                }
            }else{
                    echo "<script>alert('Пароли не совпадают')</script>";
                }
        }else{
            echo "<script>alert('Пароли меньше 4')</script>";
        }
    }else{
        echo "<script>alert('Почта введена неправильно')</script>";
    }         
}
?>
    <script src="../js/entry.js"></script>
    <script src="../js/hList.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=565f0af0-7c62-45bb-8626-681498eea6ee" type="text/javascript"></script>
    <script src="../js/search_control_ppo.js" type="text/javascript"></script>
</body>

</html>