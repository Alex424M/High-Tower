<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/advertisements.css">
    <title>Аренда</title>
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
                                header('Location: ads.php');
                            }
                        ?>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="main__container container">
                <div class="main__navigation">
                    <a href="../index.php" class="navigation__link">Главная</a>
                    <span class="navigation__arrow">></span>
                    <a href="ads.php" class="navigation__link">Аренда</a>
                </div>
                <div class="main__row">
                    <div class="main__title">Аренда квартиры</div>
                    <div class="main__quantity">9 объявлений</div>
                </div>
                <div class="main__ads ads">
                    <aside class="left-blok">
                        <div class="left-block__item">

                            <div class="left-block__title">Количество комнат</div>
                            <div class="left-block__inputs">
                                <div class="">
                                    <label class="left-block__input">
                                        <input type="checkbox" name="studio">Студия
                                    </label>
                                </div>
                                <div class="">
                                    <label class="left-block__input">
                                        <input type="checkbox" name="oneRoom">1 комната
                                    </label>
                                </div>
                                <div class="">
                                    <label class="left-block__input">
                                        <input type="checkbox" name="TwoRoom">2 комнаты
                                    </label>
                                </div>
                                <div class="">
                                    <label class="left-block__input">
                                        <input type="checkbox" name="ThreeRoom">3 комнаты
                                    </label>
                                </div>
                                <div class="">
                                    <label class="left-block__input">
                                        <input type="checkbox" name="FourRoom">3 комнаты
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="left-block__item">
                            <div class="left-block__title">Метро</div>
                            <div class="left-block__metro">
                                <select>
                                    <option>Войковская</option>
                                    <option>Щукинская</option>
                                </select>
                            </div>
                        </div>
                        <div class="left-block__item">
                            <div class="left-block__title">Стоимость</div>
                            <div class="left-block__cost">
                                <div class="cost-item">
                                    <input type="text" placeholder="от 3млн." name="" id="">
                                </div>
                                <div class="cost-item">
                                    <input type="text" placeholder="до 20млн." name="" id="">
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="right-block">
                        <div class="right-block__sort sort">
                            <div class="sort__title">Сортировка:</div>
                            <div class="sort__select">
                                <select name="" id="">
                                    <option value="">По цене возрастанию</option>
                                    <option value="">По цене убыванию</option>
                                    <option value="">По популярности</option>
                                    <option value="">По наименованию</option>
                                </select>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="ad.php" class="btn__buy">Контакты</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-block__offers offers">
                            <div class="offers__card card">
                                <div class="card__row">
                                    <div class="card__img"><img src="../img/rent/1.png" alt=""></div>
                                    <div class="card-info">
                                        <div class="card-info__row">
                                            <div class="card-info__item item__title">Квартира на Войковской</div>
                                            <div class="card-info__item item__price">19 834 384руб.</div>
                                        </div>
                                        <div class="card-info__room">2-комнт. 80м 9/50 эт.</div>
                                        <div class="card-info__line">
                                            <div class="card-info__column item__metro">Войковская</div>
                                            <div class="card-info__column item__foot">15 минут пешком</div>
                                        </div>
                                        <div class="card-info__description">Как мы уже знаем, кластерное вибрато
                                            многопланово варьирует дорийский мнимотакт. Аллегро, на первый взгляд,
                                            имитирует микрохроматический интервал. Показательный пример – райдер
                                            традиционен. Цикл, как бы это ни казалось парадоксальным, дает определенный
                                            дисторшн. Громкостнoй прогрессийный период монотонно трансформирует сонорный
                                            райдер. Арпеджио, как бы это ни казалось парадоксальным, диссонирует сет.
                                        </div>
                                        <div class="card-info__btn"><a href="#" class="btn__buy">Контакты</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="footer__container container">
                <div class="footer__content">
                    <div class="footer__row">
                        <div class="footer__column">
                            <div class="footer__item">
                                <div class="column__title">Недвижимость</div>
                                <ul>
                                    <li><a class="item__subtitle">Аренда</a></li>
                                    <li><a class="item__subtitle">Контакты</a></li>
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
            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
        } else {
            $queryHash = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
            $temp1 = mysqli_query($link, $queryHash);
            $row = mysqli_fetch_array($temp1);

            if (password_verify($pass, $row['Pass'])) {
                $nameTable = "SELECT Name FROM `users` WHERE `Mail` = '$mail'";
                $text = mysqli_fetch_array(mysqli_query($link, $nameTable));

                $_SESSION['Name'] = $text[0];
                header('Location: ads.php');
            } else {
                echo "<script>alert('Неверный логин и/или пароль')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
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
                    echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
                } else {
                    $queryMail = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
                    $tempMail = mysqli_query($link, $queryMail);
                    if (mysqli_num_rows($tempMail) > 0) {
                        echo "<script>alert('Данная почта привязана к другому аккаунту!')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
                    } else {
                        $query = "INSERT INTO `users` (Name, Mail, Pass, NumberPhone) VALUE ('$name', '$mail', '$hash', '$phone')";
                        if (mysqli_query($link, $query)) {
                            echo "<script>alert('Пользователь успешно добавлен')</script>";
                            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
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