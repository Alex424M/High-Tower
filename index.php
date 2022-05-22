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
    <link rel="stylesheet" href="css/mainPage.css">
    <title>HighTower - сайт недвижимости</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container container">
                <div class="header__content">
                    <a href="./index.php" class="header__logo">High Tower</a>
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <div class="header__menu">
                        <nav class="header__nav">
                            <a href="pages/ads.php" class="nav-btn">Аренда</a>
                            <a href="#" class="nav-btn">Продажа</a>
                            <a href="#" class="nav-btn">Новостройки</a>
                            <a href="#" class="nav-btn">Дома и участки</a>
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
                                <li><a href="pages/adding.php" class="menu__link">Разместить объявление</a></li>
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
        <section class="search">
            <div class="search__img">
                <img src="img/bck.jpg" alt="">
            </div>
            <div class="search__container container">
                <div class="search__title">Квартира вашей мечты</div>
                <div class="search__content">
                    <div class="search__btn">
                        <a href="" class="btn__buy btn-search">Купить</a>
                        <a href="" class="btn__rent btn-search">Снять</a>
                        <a href="" class="btn__sell btn-search">Продать</a>
                    </div>
                    <div class="search__row">
                        <div class="row__column1">
                            <div class="column1">
                                <select class="row__apart row-item" name="apartment">
                                <option value="A">Вторичку</option>
                                <option value="B">Новостройку</option>
                            </select>
                            <select class="row__room row-item" name="room">
                                <option value="A">Студия</option>
                                <option value="B">1 команат</option>
                                <option value="C">2 команат</option>
                                <option value="D">3 команат</option>
                                <option value="E">4 команат</option>
                            </select>
                            </div>
                            <div class="column2">
                                <select class="row__dist row-item" name="district">
                                <option value="A">Алексеевская</option>
                                <option value="B">Бауманская</option>
                                <option value="C">Войковская</option>
                                <option value="D">Коломенская</option>
                                <option value="E">Лефортово</option>
                            </select>
                            <a href="" class="btn-cost row-item">Стоимость</a>
                            </div>
                            
                        </div>
                        <div class="row__column2">

                            <a href="pages/ads.html" class="btn__search">Найти</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="buy">
            <div class="buy__container container">
                <div class="buy__content">
                    <a href="pages/ads.html" class="buy__logo logo">Купить квартиру</a>
                    <div class="offers">
                        <div class="offer__row">
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/2.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Меню -->
                        <div class="offer__row">
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/2.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="rent">
            <div class="rent__container container">
                <div class="rent__content">
                    <div class="rent__logo logo">Арендовать квартиру</div>
                    <div class="offers">
                        <div class="offer__row">
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/2.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer__row">
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/2.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/3.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="img/apartment/1.jpg" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php">ЖК Отрадное</a></div>
                                        <div class="offer__cost cost">от 7,5млн рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро Отрадное</div>
                                            <div class="location__foot foot">5 минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="hypothec">
            <div class="hypothec__container">
                <div class="hypothec__content container">
                    <div class="hypothec__logo logo">Купить квартиру в ипотеку легко</div>
                    <div class="hypothec__rowTitle">
                        <div class="hypothec__title">Наглядно покажем что нужно, чтобы подать заявку, какие документы
                            необходимо собрать и что нужно делать, чтобы одобрили ипотеку на ваше любимое жилье</div>
                    </div>
                    <div class="hypothec__row">
                        <div class="hypothec__column">
                            <div class="hypothec__item">
                                <div class="item__icon"><img src="img/icons/request.svg" alt=""></div>
                                <div class="item__title">Как я могу подать заявку на ипотеку?</div>
                                <div class="item__text">Как и где мне подать заявку</div>
                            </div>
                        </div>
                        <div class="hypothec__column">
                            <div class="hypothec__item">
                                <div class="item__icon"><img src="img/icons/documents.svg" alt=""></div>
                                <div class="item__title">Какие документы необходимы для подачи заявки на ипотеку?</div>
                                <div class="item__text">Необходимые документы и важные детали</div>
                            </div>
                        </div>
                        <div class="hypothec__column">
                            <div class="hypothec__item">
                                <div class="item__icon"><img src="img/icons/money.svg" alt=""></div>
                                <div class="item__title">Какой минимальный первоначальный взнос возможен по ипотеке?
                                </div>
                                <div class="item__text">Сколько я должен сразу заплатить</div>
                            </div>
                        </div>
                        <div class="hypothec__column">
                            <div class="hypothec__item">
                                <div class="item__icon"><img src="img/icons/request.svg" alt=""></div>
                                <div class="item__title">Как я могу подать заявку на ипотеку?</div>
                                <div class="item__text">Как и где мне подать заявку</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="about__container container">
                <div class="about__content">
                    <div class="about__logo logo">Агенство недвижимости High Tower</div>
                    <div class="about__text">
                        <p> Ищете надежные квартиры в Москве? Обратитесь в к нам. Мы предоставляем все 
                            типы объявлений начиная от продажи заканчивая арендой. Мы оказывает услуги на рынке с 2022 года.</p>

                        <p> Наш сайт позволяет удобно выбирать квартиры. С нашей помощью вы можете осуществить поиск и регистрацию недвижимости.</p>
                    </div>
                </div>
            </div>
        </section>
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
                            <div class="contacts__icon"><img src="img/icons/vk.png" alt=""></div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__icon"><img src="img/icons/facebook.png" alt=""></div>
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



    if (isset($_POST['entry'])) {
        if (empty($_POST['Email']) || empty($_POST['psw'])) {
            echo "<script>alert('Заполните все поля')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
        } else {
            $queryHash = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
            $temp1 = mysqli_query($link, $queryHash);
            $row = mysqli_fetch_array($temp1);

            if (password_verify($pass, $row['Pass'])) {
                $nameTable = "SELECT Name FROM `users` WHERE `Mail` = '$mail'";
                $text = mysqli_fetch_array(mysqli_query($link, $nameTable));

                $_SESSION['Name'] = $text[0];
                header('Location: index.php');
            } else {
                echo "<script>alert('Неверный логин и/или пароль')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
            }
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
                    echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
                } else {
                    $queryMail = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
                    $tempMail = mysqli_query($link, $queryMail);
                    if (mysqli_num_rows($tempMail) > 0) {
                        echo "<script>alert('Данная почта привязана к другому аккаунту!')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
                    } else {
                        $query = "INSERT INTO `users` (Name, Mail, Pass, NumberPhone) VALUE ('$name', '$mail', '$hash', '$phone')";
                        if (mysqli_query($link, $query)) {
                            echo "<script>alert('Пользователь успешно добавлен')</script>";
                            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
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
    <script src="js/entry.js"></script>
    <script src="js/hList.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/menu.js"></script> 
</body>

</html>