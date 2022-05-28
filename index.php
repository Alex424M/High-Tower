<?php
ob_start();
session_start();
$server= "127.0.0.1";
$username='root';
$password='';
$db='dbhightower';
$charset='utf8';

$conection=new mysqli($server, $username, $password, $db);
if(!$conection->set_charset($charset)){
    echo "charset err";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <a href="pages/ads.php?type=rent" class="nav-btn">Аренда</a>
                            <a href="pages/ads.php?type=sale" class="nav-btn">Продажа</a>
                            <a href="pages/ads.php?type=NewBuildings" class="nav-btn">Новостройки</a>
                            <a href="pages/ads.php?type=area" class="nav-btn">Дома и участки</a>
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
                    <form method="get" action="pages/ads.php">
                    <div class="search__row">
                        <div class="row__column1">
                            <div class="column1">
                                <select class="row__apart row-item" name="type">
                                <option value="rent">Аренда</option>
                                <option value="sale">Продажа</option>
                                <option value="NewBuildings">Новостройку</option>
                                <option value="area">Дом и участок</option>
                            </select>
                            <select class="row__room row-item" name="room">
                                <option value="0">Студия</option>
                                <option value="1">1 команат</option>
                                <option value="2">2 команат</option>
                                <option value="3">3 команат</option>
                                <option value="4">4 команат</option>
                            </select>
                            </div>
                            <div class="column2">
                                <select class="row__dist row-item" name="metro">
                                <option value="Алексеевская">Алексеевская</option>
                                <option value="Бауманская">Бауманская</option>
                                <option value="Войковская">Войковская</option>
                                <option value="Коломенская">Коломенская</option>
                                <option value="Лефортово">Лефортово</option>
                                <option value="Ховрино">Ховрино</option>
                                <option value="Новокосино">Новокосино</option>
                                <option value="Щелковская">Щелковская</option>
                            </select>
                            <div class="cost-btn  row-item">
                                <button type="button" class="btn-cost" value="">Стоимость</button>
                                <div class="cost__inputs">
                                    <div class="cost__row">
                                        <div class="cost__item">
                                            <input type="text" placeholder="От" name="priceStart" value="0" class="cost__from input__cost">
                                        </div>
                                        <div class="cost__item">
                                            <input type="text" placeholder="До" name="priceEnd" value="99999999" class="cost__to input__cost">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                        <div class="row__column2">
                            <input type="submit" value="Найти" class="btn__search"/>
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </section>
        <section class="buy">
            <div class="buy__container container">
                <div class="buy__content">
                    <a href="pages/ads.html" class="buy__logo logo">Купить квартиру</a>
                    <div class="offers">
                        <div class="offer__row">
                            <?php
                                $queryBuy= "SELECT * FROM announcement WHERE transaction=' Продажа' ORDER BY ID DESC LIMIT 8";
                                mysqli_query($conection, $queryBuy) or die(mysqli_errno($conection));
                                $mysqli_query=mysqli_query($conection,$queryBuy); 
                                $i=0;
                                while($states1=mysqli_fetch_array($mysqli_query)) {  
                                    
                                    if($i<2){                
                             ?>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                                    }elseif($i==3){
                                    ?>
                                    
                                    <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="offer__row">
                                <?php
                                    } else{
                        ?>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                        <?php
                                    }
                        $i++;
                                }
                        ?>
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
                        <?php
                                $queryBuy= "SELECT * FROM announcement WHERE transaction=' Аренда' ORDER BY ID DESC LIMIT 8";
                                mysqli_query($conection, $queryBuy) or die(mysqli_errno($conection));
                                $mysqli_query=mysqli_query($conection,$queryBuy); 
                                $i=0;
                                while($states1=mysqli_fetch_array($mysqli_query)) {  
                                    
                                    if($i<2){                
                             ?>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                                    }elseif($i==3){
                                    ?>
                                    
                                    <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="offer__row">
                                <?php
                                    } else{
                        ?>
                            <div class="offer__column">
                                <div class="offer__item">
                                    <div class="offer__img"><img src="data:image/png;base64, <?php echo base64_encode($states1['Photo']); ?>" alt=""></div>
                                    <div class="offer__content">
                                        <div class="offer__title title"><a href="pages/ad.php?selectedArticle=<?php echo $states1['ID']; ?>"><?php echo $states1['Title']; ?></a></div>
                                        <div class="offer__cost cost"><?php echo $states1['Cost']; ?> рублей</div>
                                        <div class="location__row">
                                            <div class="location__metro metro">Метро <?php echo $states1['Metro']; ?></div>
                                            <div class="location__foot foot"><?php echo $states1['foot']; ?> минут от метро</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                        <?php
                                    }
                        $i++;
                                }
                        ?>
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
                <input type="text" placeholder="Email" name="Email" class="input__form" required>

                <input type="password" placeholder="Пароль" name="psw" class="input__form" required>

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
                <input type="text" placeholder="Имя" name="Name" class="input__form" required>
                <input type="text" placeholder="Email" name="Email" class="input__form" required>
                <input type="text" placeholder="Номер телефона" name="Number" class="input__form" required>

                <input type="password" placeholder="Пароль" name="psw" class="input__form" required>
                <input type="password" placeholder="Повторите пароль" name="psw2" class="input__form" required>

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
    <script src="js/priceList.js"></script> 
</body>

</html>