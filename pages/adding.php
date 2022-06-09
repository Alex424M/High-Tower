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
    <title>Разместить объявление</title>
    <link rel="stylesheet" href="../css/adding.css">
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
                            <a href="ads.php?type=rent" class="nav-btn">Аренда</a>
                            <a href="ads.php?type=sale" class="nav-btn">Продажа</a>
                            <a href="ads.php?type=NewBuildings" class="nav-btn">Новостройки</a>
                            <a href="ads.php?type=area" class="nav-btn">Дома и участки</a>
                        </nav>
                        <?php
                        if (!isset($_SESSION['Name'])) { ?>
                            <button class="header__btn">Войти</button>
                    </div>

                <?php
                        } else {
                ?>
                    <div class="header__hi">
                        <div class="menu">
                            <button class="menu__button" type="button">
                                <span>Привет, <?php echo $_SESSION['Name']; ?></span>
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
                            if (isset($_POST['exit'])) {
                                $_SESSION = [];
                                header('Location: ../index.php');
                            }
                        ?>
                    </div>
                <?php
                        }
                ?>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="main__container container">
                <div class="main__navigation">
                    <a href="../index.php" class="navigation__link">Главная</a>
                    <span class="navigation__arrow">></span>
                    <a href="./adding.php" class="navigation__link">Разместить объявление</a>
                </div>
                <div class="main__row">
                    <div class="left-block">
                        <div class="left-block__title">Новое объявление</div>
                        <form method="post" class="left-block__form" enctype="multipart/form-data">
                            <div class="left-block__first">
                                <div class="left-block__subtitle subtitle">Название объявления</div>
                                <input type="text" class="input__name" name="input__name" minlength="3" maxlength="100">
                                <div class="left-block__subtitle subtitle">Описание объявления</div>
                                <textarea type="text" class="input__description" name="input__description" placeholder="Расскажите в каком состоянии квартира, была ли перепланировка, сколько было хозяев, какие соседи и т.д."></textarea>
                                <div class="left-block__subtitle subtitle">Цена</div>
                                <div class="left-block__cost-row">
                                    <label for="cost" class="row__cost">Цена</label>
                                    <input type="text" name="input__cost" class="input__cost" minlength="3">
                                    <label for="cost" class="row__cost">руб.</label>
                                </div>
                            </div>
                            <div class="left-block__second">
                                <div class="left-block__subtitle subtitle">Тип объявления</div>
                                <div class="left-block__characteristics">
                                    <ul class="characteristic-ul">
                                        <li class="characteristic-li">
                                            <span>Тип сделки</span>
                                            <div class="li__radio">
                                                <input id="radio-1" type="radio" name="radio" value="Аренда" checked>
                                                <label for="radio-1">Аренда</label>
                                            </div>
                                            <div class="li__radio">
                                                <input id="radio-2" type="radio" name="radio" value="Продажа">
                                                <label for="radio-2">Продажа</label>
                                            </div>
                                        </li>
                                        <li class="characteristic-li">
                                            <span>Тип недвижимости</span>
                                            <div class="li__radio">
                                                <input id="radio-3" type="radio" name="radio1" value="Жилая" checked>
                                                <label for="radio-3">Жилая</label>
                                            </div>
                                            <div class="li__radio">
                                                <input id="radio-4" type="radio" name="radio1" value="Новостройка">
                                                <label for="radio-4">Новостройка</label>
                                            </div>
                                            <div class="li__radio">
                                                <input id="radio-9" type="radio" name="radio1" value="Участок">
                                                <label for="radio-9">Участок</label>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                            <div class="left-block__third">
                                <div class="left-block__subtitle subtitle">Адрес</div>
                                <input type="text" name="input__address" id="suggest1" class="input__address">
                                <div class="left-block__map" id="map">

                                </div>
                                <div class="left-block__metro">
                                    <div class="metro__row">
                                        <div class="metro__station">
                                            <div class="station__metro">Станция метро(железнодорожная)</div>
                                            <select name="metro__input" class="metro__input">
                                                <option></option><?php
                                                                    $server = $_SERVER['SERVER_ADDR'];
                                                                    $username = 'root';
                                                                    $password = '';
                                                                    $db = 'dbhightower';
                                                                    $conection = new mysqli($server, $username, $password, $db);
                                                                    $queryBuy = "SELECT name FROM metroList";
                                                                    $mysqli_query = mysqli_query($conection, $queryBuy);
                                                                    while ($states1 = mysqli_fetch_array($mysqli_query)) { ?>
                                                    <option value="<?= $states1['name']; ?>"><?= $states1['name']; ?></option>
                                                <?php
                                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="metro__foot">
                                            <div class="foot__metro">Минут до метро(пешком)</div>
                                            <div>
                                                <input type="text" class="foot__input" name="foot__input" maxlength="3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="left-block__fourth">
                                <div class="left-block__subtitle subtitle">Параметр</div>
                                <div class="params__container">
                                    <div class="params__row">
                                        <label for="quantity">Количество комнат</label>
                                        <input type="text" name="params__quantity" id="" maxlength="2">
                                    </div>
                                    <div class="params__row">
                                        <label for="square">Площадь(м²)</label>
                                        <input type="text" name="params__square" id="" maxlength="5">
                                    </div>
                                    <div class="params__row" id="params__floor">
                                        <label for="floor">Этаж</label>
                                        <input type="text" name="params__floor" maxlength="3">
                                    </div>
                                    <div class="params__row">
                                        <label for="totalFloor">Этажей в доме</label>
                                        <input type="text" name="params__totalFloor" id="" maxlength="3">
                                    </div>
                                    <div class="params__row">
                                        <label for="ceilHeight">Высота потолков</label>
                                        <input type="text" name="params__ceilHeight" id="" maxlength="2">
                                    </div>
                                    <div class="params__row">
                                        <div class="params__renovation">Ремонт</div>
                                        <div class="li__radio">
                                            <input id="radio-10" type="radio" name="radio10" value="Требуется" checked>
                                            <label for="radio-10">Требуется</label>
                                        </div>
                                        <div class="li__radio">
                                            <input id="radio-11" type="radio" name="radio10" value="Евро">
                                            <label for="radio-11">Евро</label>
                                        </div>
                                        <div class="li__radio">
                                            <input id="radio-12" type="radio" name="radio10" value="Косметический">
                                            <label for="radio-12">Косметический</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="left-block__fifth">
                                <div class="left-block__subtitle subtitle">Фотографии</div>
                                <div class="photo__description">Не допускаются к размещению фотографии с водяными
                                    знаками, чужих объектов и рекламные баннеры.
                                    JPG, PNG или GIF. Максимальный размер файла 10 мб</div>
                                <div class="photo__content">
                                    <div class="photo__img"><img src="../img/icons/photo.svg" alt=""></div>
                                    <div class="photo__btn">
                                        <input type="file" name="file[]" multiple accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="upload" class="submit" value="Опубликовать">
                        </form>
                    </div>
                    <?php
                    $server = $_SERVER['SERVER_ADDR'];
                    $username = 'root';
                    $password = '';
                    $db = 'dbhightower';
                    $charset = 'utf8';

                    $conection = new mysqli($server, $username, $password, $db);
                    if (!$conection->set_charset($charset)) {
                        echo "charset err";
                    }
                    if (isset($_POST["upload"])) {

                        $name = $_POST['input__name'];
                        $description = $_POST['input__description'];
                        $cost = $_POST['input__cost'];
                        $metro = $_POST['metro__input'];
                        $transaction = $_POST['radio'];
                        $typeRealty = $_POST['radio1'];
                        $address = $_POST['input__address'];
                        $foot = $_POST['foot__input'];

                        $quantity = $_POST['params__quantity'];
                        $floor = $_POST['params__floor'];
                        $square = $_POST['params__square'];
                        $totalFloor = $_POST['params__totalFloor'];
                        $ceilHeight = $_POST['params__ceilHeight'];
                        $repair = $_POST['radio10'];
                        $user = $_SESSION['Id'];
                        $file = $_FILES['file'];
                        $name1 = $file['size'][0];

                        if (
                            $name == "" or $description == "" or $cost == "" or (($metro == "" or !is_numeric($foot)) and $typeRealty != "Участок")
                            or $address == "" or $quantity == "" or $square == "" or $totalFloor == "" or $ceilHeight == "" or $repair == ""
                            or $name1 == 0 or !is_numeric($cost)  or !is_numeric($quantity)
                            or !is_numeric($square) or (!is_numeric($floor) and $typeRealty != "Участок") or !is_numeric($totalFloor) or !is_numeric($ceilHeight)
                        ) {
                            if (
                                $name == "" or $description == "" or $cost == "" or ($metro == ""  and $typeRealty != "Участок") or $transaction == "" or $typeRealty == ""
                                or $address == "" or $foot == "" or $name1 == 0 or $quantity == "" or ($floor == "" and $typeRealty != "Участок") or $square == "" or $totalFloor == "" or $ceilHeight == "" or $repair == ""
                            ) {
                                echo "<script>alert('Заполните все поля!')</script>";
                            }
                            if (!is_numeric($cost)) {
                                echo "<script>alert('В поле цена должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($foot and $typeRealty != "Участок")) {
                                echo "<script>alert('В поле минут до метро должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($quantity)) {
                                echo "<script>alert('В поле количество комнат должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($square)) {
                                echo "<script>alert('В поле площадь должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($floor) and $typeRealty != "Участок") {
                                echo "<script>alert('В поле этаж должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($totalFloor)) {
                                echo "<script>alert('В поле этаж должны содержаться только цифры!')</script>";
                            }
                            if (!is_numeric($ceilHeight)) {
                                echo "<script>alert('В поле высота потолков должны содержаться только цифры!')</script>";
                            }
                        } else {
                            if ($typeRealty == "Участок") {
                                $conection->query("INSERT INTO announcement (Title, Description, Cost, transaction, typeRealty, address, QuantityRoom, square, totalFloor, ceilHeight, repair, IDUser)
                                VALUE ('$name', '$description', '$cost', ' $transaction', '$typeRealty', '$address', '$quantity', '$square', '$totalFloor', '$ceilHeight', '$repair', '$user')");
                            }
                            $conection->query("INSERT INTO announcement (Title, Description, Cost, Metro, transaction, typeRealty, address, foot, QuantityRoom, Floor, square, totalFloor, ceilHeight, repair, IDUser)
                            VALUE ('$name', '$description', '$cost', '$metro', ' $transaction', '$typeRealty', '$address', '$foot', '$quantity', '$floor', '$square', '$totalFloor', '$ceilHeight', '$repair', '$user')");

                            $iii = $conection->query("SELECT MAX(id) as 'id' FROM announcement");
                            $row = mysqli_fetch_array($iii);
                            $conection->close();
                            $db = new PDO("mysql:host=127.0.0.1;dbname=dbhightower", "root", "");
                            $increment = 0;
                            $pathdir = __DIR__ . "/../imgAppartments/announcement" . $row['id'];
                            mkdir($pathdir, 0777, true);
                            foreach ($_FILES['file']['name'] as $k => $f) {
                                $increment++;
                                $file = $_FILES['file'];
                                $name = $file['name'][$k];
                                $pathFile = __DIR__ . '/../imgAppartments/announcement' . $row['id'] . "/" . $name;
                                if (!move_uploaded_file($file['tmp_name'][$k], $pathFile)) {
                                    echo 'Файл не смог загрузится';
                                }
                                if ($increment == 1) {
                                    $data = $db->prepare("INSERT INTO `photos` (announcementID, photo1) VALUE (?,'$name')");
                                    $data->execute([(int)$row['id']]);
                                } else {
                                    $data = $db->prepare("UPDATE `photos` SET `photo$increment`='$name' WHERE announcementID=?");
                                    $data->execute([(int)$row['id']]);
                                }
                            }
                        }
                        echo "<meta http-equiv='refresh' content='0; url=http://high-tower/index.php'>";
                    }
                    ?>
                    <div class="right-block">
                        <div class="right-block__container">
                            <ul>
                                <li class="list__link" id="nameAd">Название и описание</li>
                                <li class="list__link" id="costAd">Цена</li>
                                <li class="list__link" id="typeAd">Тип объявления</li>
                                <li class="list__link" id="addressAd">Адрес</li>
                                <li class="list__link" id="paramsAd">Параметры</li>
                                <li class="list__link" id="photoAd">Фотографии</li>
                            </ul>
                        </div>
                    </div>
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
                                    <li><a href="../pages/ads.php?type=rent" class="item__subtitle">Аренда</a></li>
                                    <li><a href="../pages/ads.php?type=sale" class="item__subtitle">Купить</a></li>
                                    <li><a href="../pages/ads.php?type=NewBuildings" class="item__subtitle">Новостройки</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__column">
                            <div class="footer__item">
                                <div class="column__title">О компании</div>
                                <ul>
                                    <li><a href="mailto:hightower@ht.com" class="item__subtitle">Email: hightower@ht.com</a></li>
                                    <li><a href="tel:+74951389878" class="item__subtitle">Тел. +7 495 138 98 78</a></li>
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
    <script src="../js/adding.js"></script>
    <script src="../js/hList.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=565f0af0-7c62-45bb-8626-681498eea6ee" type="text/javascript"></script>
    <script src="../js/suggest.js" type="text/javascript"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/radioHide.js"></script>
</body>

</html>