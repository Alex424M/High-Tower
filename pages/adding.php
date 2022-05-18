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
                    <nav class="header__nav">
                        <a href="ads.php" class="nav-btn">Аренда</a>
                        <a href="ads.php" class="nav-btn">Продажа</a>
                        <a href="ads.php" class="nav-btn">Новостройки</a>
                        <a href="ads.php" class="nav-btn">Дома и участки</a>
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
        <div class="main">
            <div class="main__container container">
                <div class="main__navigation">
                    <a href="#" class="navigation__link">Главная</a>
                    <span class="navigation__arrow">></span>
                    <a href="#" class="navigation__link">Разместить объявление</a>
                </div>
                <div class="main__row">
                <div class="left-block">
                        <div class="left-block__title">Новое объявление</div>
                        <form method="post" class="left-block__form" enctype="multipart/form-data">
                            <div class="left-block__first">
                                <div class="left-block__subtitle subtitle">Название объявления</div>
                                <input type="text" class="input__name" name="input__name">
                                <div class="left-block__subtitle subtitle">Описание объявления</div>
                                <textarea type="text" class="input__description" name="input__description"
                                    placeholder="Расскажите в каком состоянии квартира, была ли перепланировка, сколько было хозяев, какие соседи и т.д."></textarea>
                                <div class="left-block__subtitle subtitle">Цена</div>
                                <div class="left-block__cost-row">
                                    <label for="cost" class="row__cost">Цена</label>
                                    <input type="text" name="input__cost" class="input__cost">
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
                                        </li>
                                        <li class="characteristic-li">
                                            <div class="li__items">
                                                <span>Недвижимость</span>
                                            </div>
                                            <div class="li__items li__items2">
                                                <div class="item__row">
                                                    <div class="li__radio"><input id="radio-5" type="radio"
                                                            name="radio3" value="Квартира" checked>
                                                        <label for="radio-5">Квартира</label>
                                                    </div>
                                                    <div class="li__radio"><input id="radio-6" type="radio"
                                                            name="radio3" value="Новостройка">
                                                        <label for="radio-6">Новостройка</label>
                                                    </div>
                                                </div>
                                                <div class="break"></div>
                                                <div class="item__row">
                                                    <div class="li__radio"><input id="radio-7" type="radio"
                                                            name="radio3" value="Комната">
                                                        <label for="radio-7">Комната</label>
                                                    </div>
                                                    <div class="li__radio"><input id="radio-8" type="radio"
                                                            name="radio3" value="Дом">
                                                        <label for="radio-8">Дом</label>
                                                    </div>
                                                </div>
                                                <div class="break"></div>
                                                <div>
                                                    <div class="li__radio"><input id="radio-9" type="radio"
                                                            name="radio3" value="Участок">
                                                        <label for="radio-9">Участок</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="left-block__third">
                                <div class="left-block__subtitle subtitle">Адрес</div>
                                <input type="text" name="input__address" class="input__address">
                                <div class="left-block__map">

                                </div>
                                <div class="left-block__metro">
                                    <div class="metro__row">
                                        <div class="metro__station">
                                            <div class="station__metro">Станция метро</div>
                                            <div>
                                                <input type="text" class="metro__input" name="metro__input">
                                            </div>
                                        </div>
                                        <div class="metro__foot">
                                            <div class="foot__metro">Минут до метро(пешком)</div>
                                            <div>
                                                <input type="text" class="foot__input" name="foot__input">
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
                                        <input type="text" name="params__quantity" id="">
                                    </div>
                                    <div class="params__row">
                                        <label for="square">Площадь</label>
                                        <input type="text" name="params__square" id="">
                                    </div>
                                    <div class="params__row">
                                        <label for="floor">Этаж</label>
                                        <input type="text" name="params__floor" id="">
                                    </div>
                                    <div class="params__row">
                                        <label for="totalFloor">Этажей в доме</label>
                                        <input type="text" name="params__totalFloor" id="">
                                    </div>
                                    <div class="params__row">
                                        <label for="ceilHeight">Высота потолков</label>
                                        <input type="text" name="params__ceilHeight" id="">
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
                                                <input type="file" name="img_upload" multiple accept="image/*">
                                            </div>
                                    </div>
                            </div>
                            <input type="submit" name="upload" class="submit" value="Опубликовать">
                        </form>
                    </div>
                    <?php
                     $server= $_SERVER['SERVER_ADDR'];
                     $username='root';
                     $password='';
                     $db='dbhightower';
                     $charset='utf8';

                     $conection=new mysqli($server, $username, $password, $db);
                     if(!$conection->set_charset($charset)){
                         echo "charset err";
                     }
                        if(isset($_POST["upload"])){
                           
                            $name=$_POST['input__name'];
                            $description=$_POST['input__description'];
                            $cost=$_POST['input__cost'];
                            $metro=$_POST['metro__input'];
                            $transaction=$_POST['radio'];
                            $typeRealty=$_POST['radio1'];
                            $realty=$_POST['radio3'];
                            $address=$_POST['input__address'];
                            $foot=$_POST['foot__input'];

                            $quantity=$_POST['params__quantity'];
                            $floor=$_POST['params__floor'];
                            $square=$_POST['params__square'];
                            $totalFloor=$_POST['params__totalFloor'];
                            $ceilHeight=$_POST['params__ceilHeight'];
                            $repair=$_POST['radio10'];
                            $user=$_SESSION['Name'];
                            $img=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
                            $conection->query("INSERT INTO announcement (Title, Description, Photo, Cost, Metro, transaction, typeRealty, realty, address, foot, QuantityRoom, Floor, square, totalFloor, ceilHeight, repair)
                             VALUE ('$name', '$description', '$img', '$cost', '$metro', ' $transaction', '$typeRealty', '$realty', '$address', '$foot', '$quantity', '$floor', '$square', '$totalFloor', '$ceilHeight', '$repair')");
                            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
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
    <script src="../js/adding.js"></script>
    <script src="../js/hList.js"></script>
</body>

</html>