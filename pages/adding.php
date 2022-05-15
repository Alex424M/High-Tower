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
                        <a href="#" class="nav-btn">Продажа</a>
                        <a href="#" class="nav-btn">Новостройки</a>
                        <a href="#" class="nav-btn">Дома и участки</a>
                    </nav>
                    <a href="adding.html" class="header__btn">Разместить объявление</a>
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
                        <form method="post" class="left-block__form">
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
                                        <form method="post">
                                        <div class="photo__img"><img src="../img/icons/photo.svg" alt=""></div>
                                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                                        <div class="photo__btn">
                                            <button>Добавить фотографии</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div id="gallery"></div>
                                <progress id="progress-bar" max=100 value=0></progress>
                            </div>
                            <button class="submit" type="submit">Опубликовать</button>
                        </form>
                    </div>
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
</body>

</html>