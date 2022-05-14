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
                    <nav class="header__nav">
                        <a href="ads.php" class="nav-btn">Аренда</a>
                        <a href="#" class="nav-btn">Продажа</a>
                        <a href="#" class="nav-btn">Новостройки</a>
                        <a href="#" class="nav-btn">Дома и участки</a>
                    </nav>
                    <?php
                    if (!isset($_SESSION['Name'])) { ?>
                    <button class="header__btn">Войти</button>
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
                                header('Location: ad.php');
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
                <div class="announcement__navigation">
                    <a href="#" class="navigation__link">Главная</a>
                    <span class="navigation__arrow">></span>
                    <a href="#" class="navigation__link">Аренда</a>
                    <span class="navigation__arrow">></span>
                    <a href="#" class="navigation__link">Квартира на Войковской</a>
                </div>
                <div class="announcement__row">
                    <main class="left-block">
                        <div class="left-block__row">
                            <div class="left-block__title">
                                <h1>Квартира рядом с Войковской</h1>
                            </div>
                            <div class="left-block__icon"><img src="../img/icons/like-heart.svg" alt=""></div>
                        </div>
                        <div class="left-block__img"><img src="../img/apartment/4.png" alt=""></div>
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
                                        <div class="params__title">80м</div>
                                        <div class="params__subtitle">Площадь</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title">7</div>
                                        <div class="params__subtitle">Этаж</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title">27</div>
                                        <div class="params__subtitle">Этажей</div>
                                    </div>
                                </div>
                                <div class="params__column">
                                    <div class="params__item">
                                        <div class="params__title">2.5м</div>
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
                                        <span>жилая</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Тип сделки</span>
                                        <span>аренда</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Высота потолков</span>
                                        <span>3 м</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Количество комнат</span>
                                        <span>3</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Площадь</span>
                                        <span>56м</span>
                                    </li>
                                    <li class="characteristic-li">
                                        <span>Ремонт</span>
                                        <span>Евро</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="left-block__description description">
                            <div class="description__title title">Описание</div>
                            <div class="description__text">Ротор векторного поля непосредственно масштабирует убывающий
                                неопределенный интеграл. Математическое моделирование однозначно показывает, что тройной
                                интеграл изменяет критерий интегрируемости, что и требовалось доказать. Интеграл от
                                функции комплексной переменной, исключая очевидный случай, непосредственно масштабирует
                                критерий интегрируемости. Окрестность точки, исключая очевидный случай, проецирует
                                интеграл от функции, обращающейся в бесконечность в изолированной точке, при этом,
                                вместо 13 можно взять любую другую константу.</div>
                        </div>
                        <div class="left-block__map map">
                            <div class="map__title title">Адрес</div>
                            <div class="map__addres"></div>
                            <div class="map__container"></div>
                        </div>
                    </main>
                    <aside class="right-block">
                        <div class="right-block__price">19 953 826 руб.</div>
                        <div class="right-block__costMeter">156 434 руб./м</div>
                        <a href="#" class="right-block__cotact">Показать контакты</a>
                        <div class="right-block__name">Компания Москва</div>
                        <div class="right-block__change">Дом 8, сдан в 4 кв. 2013</div>
                        <div class="right-block__address">Москва, 1-я Радиаторская улица, 7</div>
                        <div class="right-block__row">
                            <div class="right-block__metro">м.Войковская</div>
                            <div class="right-block__time">7 минут пешком</div>
                        </div>
                    </aside>
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
</body>

</html>