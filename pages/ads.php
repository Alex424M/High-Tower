<?php
ob_start();
session_start();
$server = $_SERVER['SERVER_ADDR'];
$username = 'root';
$password = '';
$db = 'dbhightower';
$charset = 'utf8';

$conection = new mysqli($server, $username, $password, $db);
if (!$conection->set_charset($charset)) {
    echo "charset err";
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/advertisements.css">
    <link rel="icon" href="../img/icons/Union.png" type="image/x-icon">
    <?php
    if ($_GET['type'] == "rent") { ?>
        <title>Аренда</title>
    <?php
    } elseif ($_GET['type'] == "sale") { ?>
        <title>Продажа</title>
    <?php
    } elseif ($_GET['type'] == "NewBuildings") { ?>
        <title>Новостройки</title>
    <?php
    } elseif ($_GET['type'] == "area") { ?>
        <title>Участки</title>
    <?php
    } ?>
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
                                header('Location: ads.php?type=' . $_GET['type'] . '&room=' . $_GET['room'] . '&metro=' . $_GET['metro'] . '&priceStart=' . $_GET['priceStart'] . '&priceEnd=' . $_GET['priceEnd']);
                            }
                        ?>
                    </div>
                <?php
                        }
                ?>
                </div>
            </div>
        </header>
        <?php
        if ($_GET['type'] == "rent") {
        ?>
            <main class="main">
                <div class="main__container container">
                    <div class="main__navigation">
                        <a href="../index.php" class="navigation__link">Главная</a>
                        <span class="navigation__arrow">></span>
                        <a href="ads.php?type=rent" class="navigation__link">Аренда</a>
                    </div>
                    <?php
                    $sql = "SELECT *, (SELECT photo1 FROM photos WHERE announcementID=a.ID) as 'photo1' 
                    FROM announcement a WHERE transaction=' Аренда' AND typeRealty!='Участок'";
                    $queryCount = "SELECT COUNT(*) FROM announcement WHERE transaction=' Аренда' AND typeRealty!='Участок'";
                    if (!empty($_GET['room'])) {
                        $rooms = $_GET['room'];
                        if (is_array($rooms)) { //проверка на массив
                            $sql .= " and(";
                            $queryCount .= " and(";
                            $i = 0;
                            foreach ($rooms as $room) { //перебор массива комнат
                                if ($i == 0) {
                                    $sql .= " QuantityRoom=" . $room;
                                    $queryCount .= " QuantityRoom=" . $room;
                                } else {
                                    $sql .= " OR QuantityRoom=" . $room;
                                    $queryCount .= " OR QuantityRoom=" . $room;
                                }
                                $i++;
                            }
                            $sql .= ")";
                            $queryCount .= ")";
                        } else {
                            $sql .= ' and QuantityRoom=' . $rooms;
                            $queryCount .= ' and QuantityRoom=' . $rooms;
                        }
                    }
                    if (!empty($_GET['metro'])) {
                        $sql .= " and Metro='" . $_GET['metro'] . "'";
                        $queryCount .= " and Metro='" . $_GET['metro'] . "'";
                    }
                    if (!empty($_GET['priceStart'])) {
                        $sql .= " and Cost>=" . $_GET['priceStart'];
                        $queryCount .= " and Cost>=" . $_GET['priceStart'];
                    }
                    if (!empty($_GET['priceEnd'])) {
                        $sql .= " and Cost<=" . $_GET['priceEnd'];
                        $queryCount .= " and Cost<=" . $_GET['priceEnd'];
                    }
                    if (!empty($_GET['costd'])) {
                        $sql .= " ORDER BY Cost " . $_GET['costd'] . "";
                        $queryCount .= " ORDER BY Cost " . $_GET['costd'] . "";
                    } else {
                        $sql .= " ORDER BY Cost ASC";
                        $queryCount .= " ORDER BY Cost ASC";
                    }
                    $quantity = mysqli_query($conection, $queryCount);
                    $row = $quantity->fetch_row();
                    $count = $row[0];
                    ?>
                    <div class="main__row">
                        <div class="main__title">Аренда квартиры</div>
                        <div class="main__quantity"><?php if ($count % 10 == 1) {
                                                        echo $count . " объявление";
                                                    } elseif ($count % 10 > 1 and $count % 10 < 5) {
                                                        echo $count . " объявления";
                                                    } elseif ($count % 10 > 4) {
                                                        echo $count . " объявлений";
                                                    } elseif ($count == 0) {
                                                        echo $count . " объявлений";
                                                    }  ?></div>
                    </div>
                    <div class="main__ads ads">
                        <aside class="left-blok">
                            <form method="get">
                                <div class="left-block__item">
                                    <div class="left-block__title">Количество комнат</div>
                                    <div class="left-block__inputs">
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="0">Студия
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="1">1 комната
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="2">2 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="3">3 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="4">4 комнаты
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Метро</div>
                                    <div class="left-block__metro">
                                        <select name="metro">
                                            <option></option><?php
                                                                $queryBuy = "SELECT name FROM metrolist";
                                                                $mysqli_query = mysqli_query($conection, $queryBuy);
                                                                while ($states1 = mysqli_fetch_array($mysqli_query)) { ?>
                                                <option value="<?= $states1['name']; ?>"><?= $states1['name']; ?></option>
                                            <?php
                                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Стоимость</div>
                                    <div class="left-block__cost">
                                        <div class="cost-item">
                                            <input type="text" placeholder="от 3млн." name="priceStart" id="">
                                        </div>
                                        <div class="cost-item">
                                            <input type="text" placeholder="до 20млн." name="priceEnd" id="">
                                        </div>
                                    </div>
                                </div>
                                <button type='submit' name="type" value="rent" class="left-block__applybtn">Сохранить</button>
                            </form>

                        </aside>
                        <div class="right-block">
                            <form method="post">

                                <?php
                                $result = mysqli_query($conection, $sql) or die(mysqli_errno($conection));
                                if (mysqli_num_rows(mysqli_query($conection, $sql)) > 0) {
                                    $states = mysqli_query($conection, $sql);
                                    while ($states1 = mysqli_fetch_array($states)) {

                                ?>
                                        <div class="right-block__offers offers">
                                            <form method="post" class="rightForm">
                                                <div class="offers__card card">
                                                    <div class="card__row">
                                                        <div class="card__img"><img src="../imgAppartments/announcement<?php echo $states1['ID'] . "/";
                                                                                                                        echo $states1['photo1']; ?>" alt="Изображение"></div>
                                                        <div class="card-info">
                                                            <div class="card-info__row">
                                                                <div class="card-info__item item__title"><?php echo $states1['Title']; ?></div>
                                                                <div class="card-info__item item__price"><?php echo $states1['Cost']; ?> руб.</div>
                                                            </div>
                                                            <div class="card-info__room">
                                                                <?php if ($states1['QuantityRoom'] == 0) {
                                                                    echo "Студия";
                                                                } else {
                                                                    echo $states1['QuantityRoom'] . " комнт. ";
                                                                } ?> <?php echo $states1['square']; ?>м²
                                                                <?php echo $states1['Floor']; ?>/ <?php echo $states1['totalFloor']; ?> эт.
                                                            </div>
                                                            <div class="card-info__line">
                                                                <div class="card-info__column item__metro"><?php echo $states1['Metro']; ?></div>
                                                                <div class="card-info__column item__foot"><?php echo $states1['foot']; ?> минут пешком</div>
                                                            </div>
                                                            <div class="card-info__description">
                                                                <?php echo $states1['Description']; ?>
                                                            </div>
                                                            <div class="card-info__btn">
                                                                <?php
                                                                echo "<input type = \"submit\" value = \"Посмотреть\" class=\"btn__buy\" name = \"$states1[ID]\">";
                                                                if (isset($_POST[$states1['ID']])) {
                                                                    $_SESSION['SelectArticle'] = $states1['ID'];
                                                                    header("Location: ad.php");
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>

                    </div>
                </div>
            </main>
        <?php
        } elseif ($_GET['type'] == "sale") {
        ?>
            <main class="main">
                <div class="main__container container">
                    <div class="main__navigation">
                        <a href="../index.php" class="navigation__link">Главная</a>
                        <span class="navigation__arrow">></span>
                        <a href="ads.php?type=sale" class="navigation__link">Продажа</a>
                    </div>
                    <?php
                    $sql = "SELECT *, (SELECT photo1 FROM photos WHERE announcementID=a.ID) as 'photo1' 
                    FROM announcement a WHERE transaction=' Продажа' AND typeRealty!='Участок'";
                    $queryCount = "SELECT COUNT(*) FROM announcement WHERE transaction=' Продажа' AND typeRealty!='Участок'";
                    if (!empty($_GET['room'])) {
                        $rooms = $_GET['room'];
                        if (is_array($rooms)) { //проверка на массив
                            $sql .= " and(";
                            $queryCount .= " and(";
                            $i = 0;
                            foreach ($rooms as $room) { //перебор массива комнат
                                if ($i == 0) {
                                    $sql .= " QuantityRoom=" . $room;
                                    $queryCount .= " QuantityRoom=" . $room;
                                } else {
                                    $sql .= " OR QuantityRoom=" . $room;
                                    $queryCount .= " OR QuantityRoom=" . $room;
                                }
                                $i++;
                            }
                            $sql .= ")";
                            $queryCount .= ")";
                        } else {
                            $sql .= ' and QuantityRoom=' . $rooms;
                            $queryCount .= ' and QuantityRoom=' . $rooms;
                        }
                    }
                    if (!empty($_GET['metro'])) {
                        $sql .= " and Metro='" . $_GET['metro'] . "'";
                        $queryCount .= " and Metro='" . $_GET['metro'] . "'";
                    }
                    if (!empty($_GET['priceStart'])) {
                        $sql .= " and Cost>=" . $_GET['priceStart'];
                        $queryCount .= " and Cost>=" . $_GET['priceStart'];
                    }
                    if (!empty($_GET['priceEnd'])) {
                        $sql .= " and Cost<=" . $_GET['priceEnd'];
                        $queryCount .= " and Cost<=" . $_GET['priceEnd'];
                    }
                    $p = (!isset($_GET['p'])) ? $p = 0 : $p = $_GET['p'];
                    $sql .= " ORDER BY Cost ASC";
                    $queryCount .= " ORDER BY Cost";
                    $quantity = mysqli_query($conection, $queryCount);
                    $row = $quantity->fetch_row();
                    $count = $row[0];
                    ?>
                    <div class="main__row">
                        <div class="main__title">Продажа квартиры</div>
                        <div class="main__quantity"><?php if ($count % 10 == 1) {
                                                        echo $count . " объявление";
                                                    } elseif ($count % 10 > 1 and $count % 10 < 5) {
                                                        echo $count . " объявления";
                                                    } elseif ($count % 10 > 4) {
                                                        echo $count . " объявлений";
                                                    }  ?></div>
                    </div>
                    <div class="main__ads ads">
                        <aside class="left-blok">
                            <form method="get" method="ads.php">
                                <div class="left-block__item">

                                    <div class="left-block__title">Количество комнат</div>
                                    <div class="left-block__inputs">
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="0">Студия
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="1">1 комната
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="2">2 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="3">3 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="4">4 комнаты
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Метро</div>
                                    <div class="left-block__metro">
                                        <select name="metro">
                                            <option></option><?php
                                                                $queryBuy = "SELECT name FROM metroList";
                                                                $mysqli_query = mysqli_query($conection, $queryBuy);
                                                                while ($states1 = mysqli_fetch_array($mysqli_query)) { ?>
                                                <option value="<?= $states1['name']; ?>"><?= $states1['name']; ?></option>
                                            <?php
                                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Стоимость</div>
                                    <div class="left-block__cost">
                                        <div class="cost-item">
                                            <input type="text" placeholder="от 3млн." name="priceStart" id="">
                                        </div>
                                        <div class="cost-item">
                                            <input type="text" placeholder="до 20млн." name="priceEnd" id="">
                                        </div>
                                    </div>
                                </div>
                                <button type='submit' name="type" value="sale" class="left-block__applybtn">Сохранить</button>
                            </form>

                        </aside>
                        <div class="right-block">
                            <form method="post">
                                <?php
                                $result = mysqli_query($conection, $sql) or die(mysqli_errno($conection));
                                if (mysqli_num_rows(mysqli_query($conection, $sql)) > 0) {
                                    $states = mysqli_query($conection, $sql);
                                    while ($states1 = mysqli_fetch_array($states)) {


                                ?>
                                        <div class="right-block__offers offers">
                                            <form method="post" class="rightForm">
                                                <div class="offers__card card">
                                                    <div class="card__row">
                                                        <div class="card__img"><img src="../imgAppartments/announcement<?php echo $states1['ID'] . "/";
                                                                                                                        echo $states1['photo1']; ?>" alt="Изображение"></div>
                                                        <div class="card-info">
                                                            <div class="card-info__row">
                                                                <div class="card-info__item item__title"><?php echo $states1['Title']; ?></div>
                                                                <div class="card-info__item item__price"><?php echo $states1['Cost']; ?> руб.</div>
                                                            </div>
                                                            <div class="card-info__room"><?php if ($states1['QuantityRoom'] == 0) {
                                                                                                echo "Студия";
                                                                                            } else {
                                                                                                echo $states1['QuantityRoom'] . " комнт. ";
                                                                                            } ?> <?php echo $states1['square']; ?>м²
                                                                <?php echo $states1['Floor']; ?>/ <?php echo $states1['totalFloor']; ?> эт. </div>
                                                            <div class="card-info__line">
                                                                <div class="card-info__column item__metro"><?php echo $states1['Metro']; ?></div>
                                                                <div class="card-info__column item__foot"><?php echo $states1['foot']; ?> минут пешком</div>
                                                            </div>
                                                            <div class="card-info__description">
                                                                <?php echo $states1['Description']; ?>
                                                            </div>
                                                            <div class="card-info__btn">
                                                                <?php
                                                                echo "<input type = \"submit\" value = \"Посмотреть\" class=\"btn__buy\" name = \"$states1[ID]\">";
                                                                if (isset($_POST[$states1['ID']])) {
                                                                    $_SESSION['SelectArticle'] = $states1['ID'];
                                                                    header("Location: ad.php");
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        <?php
        } elseif ($_GET['type'] == "NewBuildings") {
        ?>
            <main class="main">
                <div class="main__container container">
                    <div class="main__navigation">
                        <a href="../index.php" class="navigation__link">Главная</a>
                        <span class="navigation__arrow">></span>
                        <a href="ads.php?type=NewBuildings" class="navigation__link">Новостройки</a>
                    </div>
                    <?php
                    $sql = "SELECT *, (SELECT photo1 FROM photos WHERE announcementID=a.ID) as 'photo1' FROM announcement a WHERE typeRealty='Новостройка'";
                    $queryCount = "SELECT COUNT(*) FROM announcement WHERE transaction='Новостройка'";
                    if (!empty($_GET['room'])) {
                        $rooms = $_GET['room'];
                        if (is_array($rooms)) { //проверка на массив
                            $sql .= " and(";
                            $queryCount .= " and(";
                            $i = 0;
                            foreach ($rooms as $room) { //перебор массива комнат
                                if ($i == 0) {
                                    $sql .= " QuantityRoom=" . $room;
                                    $queryCount .= " QuantityRoom=" . $room;
                                } else {
                                    $sql .= " OR QuantityRoom=" . $room;
                                    $queryCount .= " OR QuantityRoom=" . $room;
                                }
                                $i++;
                            }
                            $sql .= ")";
                            $queryCount .= ")";
                        } else {
                            $sql .= ' and QuantityRoom=' . $rooms;
                            $queryCount .= ' and QuantityRoom=' . $rooms;
                        }
                    }
                    if (!empty($_GET['metro'])) {
                        $sql .= " and Metro='" . $_GET['metro'] . "'";
                        $queryCount .= " and Metro='" . $_GET['metro'] . "'";
                    }
                    if (!empty($_GET['priceStart'])) {
                        $sql .= " and Cost>=" . $_GET['priceStart'];
                        $queryCount .= " and Cost>=" . $_GET['priceStart'];
                    }
                    if (!empty($_GET['priceEnd'])) {
                        $sql .= " and Cost<=" . $_GET['priceEnd'];
                        $queryCount .= " and Cost<=" . $_GET['priceEnd'];
                    }
                    if (!empty($_GET['costd'])) {
                        $sql .= " ORDER BY Cost " . $_GET['costd'] . "";
                        $queryCount .= " ORDER BY Cost " . $_GET['costd'] . "";
                    } else {
                        $sql .= " ORDER BY Cost ASC";
                        $queryCount .= " ORDER BY Cost ASC";
                    }
                    $quantity = mysqli_query($conection, $queryCount);
                    $row = $quantity->fetch_row();
                    $count = $row[0];
                    ?>
                    <div class="main__row">
                        <div class="main__title">Новостройки</div>
                        <div class="main__quantity"><?php if ($count % 10 == 1) {
                                                        echo $count . " объявление";
                                                    } elseif ($count % 10 > 1 and $count % 10 < 5) {
                                                        echo $count . " объявления";
                                                    } elseif ($count % 10 > 4) {
                                                        echo $count . " объявлений";
                                                    }  ?></div>
                    </div>
                    <div class="main__ads ads">
                        <aside class="left-blok">
                            <form method="get">
                                <div class="left-block__item">

                                    <div class="left-block__title">Количество комнат</div>
                                    <div class="left-block__inputs">
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="0">Студия
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="1">1 комната
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="2">2 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="3">3 комнаты
                                            </label>
                                        </div>
                                        <div class="">
                                            <label class="left-block__input">
                                                <input type="checkbox" name="room[]" value="4">4 комнаты
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Метро</div>
                                    <div class="left-block__metro">
                                        <select name="metro">
                                            <option></option><?php
                                                                $queryBuy = "SELECT name FROM metroList";
                                                                $mysqli_query = mysqli_query($conection, $queryBuy);
                                                                while ($states1 = mysqli_fetch_array($mysqli_query)) { ?>
                                                <option value="<?= $states1['name']; ?>"><?= $states1['name']; ?></option>
                                            <?php
                                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="left-block__item">
                                    <div class="left-block__title">Стоимость</div>
                                    <div class="left-block__cost">
                                        <div class="cost-item">
                                            <input type="text" placeholder="от 3млн." name="priceStart" id="">
                                        </div>
                                        <div class="cost-item">
                                            <input type="text" placeholder="до 20млн." name="priceEnd" id="">
                                        </div>
                                    </div>
                                </div>
                                <button type='submit' name="type" value="sale" class="left-block__applybtn">Сохранить</button>
                            </form>

                        </aside>
                        <div class="right-block">
                            <form method="post">

                                <?php

                                $result = mysqli_query($conection, $sql) or die(mysqli_errno($conection));
                                if (mysqli_num_rows(mysqli_query($conection, $sql)) > 0) {
                                    $states = mysqli_query($conection, $sql);
                                    while ($states1 = mysqli_fetch_array($states)) {


                                ?>
                                        <div class="right-block__offers offers">
                                            <form method="post" class="rightForm">
                                                <div class="offers__card card">
                                                    <div class="card__row">
                                                        <div class="card__img"><img src="../imgAppartments/announcement<?php echo $states1['ID'] . "/";
                                                                                                                        echo $states1['photo1']; ?>" alt="Изображение"></div>
                                                        <div class="card-info">
                                                            <div class="card-info__row">
                                                                <div class="card-info__item item__title"><?php echo $states1['Title']; ?></div>
                                                                <div class="card-info__item item__price"><?php echo $states1['Cost']; ?> руб.</div>
                                                            </div>
                                                            <div class="card-info__room"><?php if ($states1['QuantityRoom'] == 0) {
                                                                                                echo "Студия";
                                                                                            } else {
                                                                                                echo $states1['QuantityRoom'] . " комнт. ";
                                                                                            } ?> <?php echo $states1['square']; ?>м²
                                                                <?php echo $states1['Floor']; ?>/ <?php echo $states1['totalFloor']; ?> эт. </div>
                                                            <div class="card-info__line">
                                                                <div class="card-info__column item__metro"><?php echo $states1['Metro']; ?></div>
                                                                <div class="card-info__column item__foot"><?php echo $states1['foot']; ?> минут пешком</div>
                                                            </div>
                                                            <div class="card-info__description">
                                                                <?php echo $states1['Description']; ?>
                                                            </div>
                                                            <div class="card-info__btn">
                                                                <?php
                                                                echo "<input type = \"submit\" value = \"Посмотреть\" class=\"btn__buy\" name = \"$states1[ID]\">";
                                                                if (isset($_POST[$states1['ID']])) {
                                                                    $_SESSION['SelectArticle'] = $states1['ID'];
                                                                    header("Location: ad.php");
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        <?php
        } elseif ($_GET['type'] == "area") {
        ?>
            <main class="main">
                <div class="main__container container">
                    <div class="main__navigation">
                        <a href="../index.php" class="navigation__link">Главная</a>
                        <span class="navigation__arrow">></span>
                        <a href="ads.php?type=area" class="navigation__link">Дома и участки</a>
                    </div>
                    <?php
                    $sql = "SELECT *, (SELECT photo1 FROM photos WHERE announcementID=a.ID) as 'photo1' FROM announcement a WHERE typeRealty='Участок'";
                    $queryCount = "SELECT COUNT(*) FROM announcement WHERE transaction='Участок'";

                    if (!empty($_GET['priceStart'])) {
                        $sql .= " and Cost>=" . $_GET['priceStart'];
                        $queryCount .= " and Cost>=" . $_GET['priceStart'];
                    }
                    if (!empty($_GET['priceEnd'])) {
                        $sql .= " and Cost<=" . $_GET['priceEnd'];
                        $queryCount .= " and Cost<=" . $_GET['priceEnd'];
                    }
                    if (!empty($_GET['costd'])) {
                        $sql .= " ORDER BY Cost " . $_GET['costd'] . "";
                        $queryCount .= " ORDER BY Cost " . $_GET['costd'] . "";
                    } else {
                        $sql .= " ORDER BY Cost ASC";
                        $queryCount .= " ORDER BY Cost ASC";
                    }
                    $quantity = mysqli_query($conection, $queryCount);
                    $row = $quantity->fetch_row();
                    $count = $row[0];
                    ?>
                    <div class="main__row">
                        <div class="main__title">Участки</div>
                        <div class="main__quantity"><?php if ($count % 10 == 1) {
                                                        echo $count . " объявление";
                                                    } elseif ($count % 10 > 1 and $count % 10 < 5) {
                                                        echo $count . " объявления";
                                                    } elseif ($count % 10 > 4) {
                                                        echo $count . " объявлений";
                                                    } ?></div>
                    </div>
                    <div class="main__ads ads">
                        <aside class="left-blok">
                            <form method="get">
                                <div class="left-block__item">


                                    <div class="left-block__item">
                                        <div class="left-block__title">Стоимость</div>
                                        <div class="left-block__cost">
                                            <div class="cost-item">
                                                <input type="text" placeholder="от 3млн." name="priceStart" id="">
                                            </div>
                                            <div class="cost-item">
                                                <input type="text" placeholder="до 20млн." name="priceEnd" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <button type='submit' name="type" value="area" class="left-block__applybtn">Сохранить</button>
                            </form>

                        </aside>
                        <div class="right-block">
                            <form method="post">

                                <?php
                                $result = mysqli_query($conection, $sql) or die(mysqli_errno($conection));
                                if (mysqli_num_rows(mysqli_query($conection, $sql)) > 0) {
                                    $states = mysqli_query($conection, $sql);
                                    while ($states1 = mysqli_fetch_array($states)) {


                                ?>
                                        <div class="right-block__offers offers">
                                            <form method="post" class="rightForm">
                                                <div class="offers__card card">
                                                    <div class="card__row">
                                                        <div class="card__img"><img src="../imgAppartments/announcement<?php echo $states1['ID'] . "/";
                                                                                                                        echo $states1['photo1']; ?>" alt="Изображение"></div>
                                                        <div class="card-info">
                                                            <div class="card-info__row">
                                                                <div class="card-info__item item__title"><?php echo $states1['Title']; ?></div>
                                                                <div class="card-info__item item__price"><?php echo $states1['Cost']; ?> руб.</div>
                                                            </div>
                                                            <div class="card-info__room"><?php if ($states1['QuantityRoom'] != 0) {
                                                                                                echo $states1['QuantityRoom'] . "  комнт. ";
                                                                                            } ?> <?php echo $states1['square']; ?>м²
                                                                <?php echo $states1['Floor']; ?>/ <?php echo $states1['totalFloor']; ?> эт. </div>
                                                            <div class="card-info__line">

                                                            </div>
                                                            <div class="card-info__description">
                                                                <?php echo $states1['Description']; ?>
                                                            </div>
                                                            <div class="card-info__btn">
                                                                <?php
                                                                echo "<input type = \"submit\" value = \"Посмотреть\" class=\"btn__buy\" name = \"$states1[ID]\">";
                                                                if (isset($_POST[$states1['ID']])) {
                                                                    $_SESSION['SelectArticle'] = $states1['ID'];
                                                                    header("Location: ad.php");
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
            </main>
        <?php
        }
        ?>
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
                <input type="email" placeholder="Email" name="Email" class="input__form" required>

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
                <input type="text" placeholder="Имя" name="Name" class="input__form" required onkeypress="noDigits(event)">
                <input type="email" placeholder="Email" name="Email" class="input__form" required>
                <input type="text" placeholder="Номер телефона" name="Number" class="input__form" id="phone" pattern="[\+]\d{1}\s[\(]\d{3}[\)]\s\d{3}[\-]\d{2}[\-]\d{2}" minlength="18" maxlength="18" required>

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


        if (empty($_POST['Email']) || empty($_POST['psw'])) {
            echo "<script>alert('Заполните все поля')</script>";
            echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php'>";
        } else {
            $queryHash = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
            $temp1 = mysqli_query($conection, $queryHash);
            $row = mysqli_fetch_array($temp1);

            if (password_verify($pass, $row['Pass'])) {
                $nameTable = "SELECT Name FROM `users` WHERE `Mail` = '$mail'";
                $text = mysqli_fetch_array(mysqli_query($conection, $nameTable));
                $_SESSION['Id'] = $row['ID'];
                $_SESSION['Name'] = $text[0];
                header('Location: ads.php?type=' . $_GET['type'] . '&room=' . $_GET['room'] . '&metro=' . $_GET['metro'] . '&priceStart=' . $_GET['priceStart'] . '&priceEnd=' . $_GET['priceEnd']);
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

        if ($pass == $repPass) {
            if (empty($_POST['Name']) || empty($_POST['Email']) || empty($_POST['psw']) || empty($_POST['psw2']) || empty($_POST['Number'])) {
                echo "<script>alert('Заполните все поля!')</script>";
                echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php?type=rent'>";
            } else {
                $queryMail = "SELECT * FROM `users` WHERE `Mail` = '$mail'";
                $tempMail = mysqli_query($conection, $queryMail);
                if (mysqli_num_rows($tempMail) > 0) {
                    echo "<script>alert('Данная почта привязана к другому аккаунту!')</script>";
                    echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php?type=rent'>";
                } else {
                    $query = "INSERT INTO `users` (Name, Mail, Pass, NumberPhone) VALUE ('$name', '$mail', '$hash', '$phone')";
                    if (mysqli_query($conection, $query)) {
                        echo "<script>alert('Пользователь успешно добавлен')</script>";
                        echo "<meta http-equiv='refresh' content='0; url=http://high-tower/pages/ads.php?type=rent'>";
                    } else {
                        echo "Пользователь не добавлен и за ошибки: " . mysqli_error($conection);
                    }
                }
            }
        } else {
            echo "<script>alert('Пароли не совпадают')</script>";
        }
    }
    ?>
    <script src="../js/entry.js"></script>
    <script src="../js/hList.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/select.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="../js/phone.js"></script>
</body>
<?php
function page($transact, $type)
{

    $link = new mysqli("127.0.0.1", "root", "", "dbhightower");
    //???????????????????   $link      ???????????????????????????????????
    if ($type == 'Новостройка') {
        $sq = "SELECT COUNT(*) FROM announcement WHERE typeRealty='Новостройка' order by Cost ";
        if ($res = $link->query($sq)) {
            $res = $res->fetch_assoc();
            $res = ceil($res['COUNT(*)'] / 10);
        }
    } elseif ($type == 'Участок') {
        $sq = "SELECT COUNT(*) FROM announcement WHERE typeRealty='Участок' order by Cost ";
        if ($res = $link->query($sq)) {
            $res = $res->fetch_assoc();
            $res = ceil($res['COUNT(*)'] / 10);
        }
    } elseif ($type != 'Участок') {
        $sq = "SELECT COUNT(*) FROM announcement WHERE transaction='" . $transact . "' AND typeRealty!='Участок' ";
        if (!empty($_GET['room'])) {
            $rooms = $_GET['room'];
            if (is_array($rooms)) { //проверка на массив
                $sq .= " and(";
                $i = 0;
                foreach ($rooms as $room) { //перебор массива комнат
                    if ($i == 0) {
                        $sq .= " QuantityRoom=" . $room;
                    } else {
                        $sq .= " OR QuantityRoom=" . $room;
                    }
                    $i++;
                }
                $sq .= ")";
            } else {
                $sq .= ' and QuantityRoom=' . $rooms;
            }
        }
        if (!empty($_GET['metro'])) {
            $sq .= " and Metro='" . $_GET['metro'] . "'";
        }
        if (!empty($_GET['priceStart'])) {
            $sq .= " and Cost>=" . $_GET['priceStart'];
        }
        if (!empty($_GET['priceEnd'])) {
            $sq .= " and Cost<=" . $_GET['priceEnd'];
        }
        if ($res = $link->query($sq)) {
            $res = $res->fetch_assoc();
            $res = ceil($res['COUNT(*)'] / 10);
        }
    }
    return $res;
}
function pagination($pages, $type)
{
    if ($type == " Продажа") {
        for ($i = 0; $i < $pages; $i++) {
            echo '<a href="ads.php?type=sale&metro=' . $_GET['metro'] . '&priceStart=0
            &priceEnd=' . $_GET['priceEnd'] . '&p=' . $i . '">' . ($i + 1) . " " . '</a>';
        }
    } elseif ($type == " Аренда") {
        for ($i = 0; $i < $pages; $i++) {
            echo '<a href="ads.php?type=rent&metro=' . $_GET['metro'] . '&priceStart=0
            &priceEnd=' . $_GET['priceEnd'] . '&p=' . $i . '">' . ($i + 1) . " " . '</a>';
        }
    } elseif ($type == "Новостройка") {
        for ($i = 0; $i < $pages; $i++) {
            echo '<a href="ads.php?type=NewBuildings&metro=' . $_GET['metro'] . '&priceStart=0
            &priceEnd=' . $_GET['priceEnd'] . '&p=' . $i . '">' . ($i + 1) . " " . '</a>';
        }
    } elseif ($type == "Участок") {
        for ($i = 0; $i < $pages; $i++) {
            echo '<a href="ads.php?type=area&metro=' . $_GET['metro'] . '&priceStart=0
            &priceEnd=' . $_GET['priceEnd'] . '&p=' . $i . '">' . ($i + 1) . " " . '</a>';
        }
    }
}
?>

</html>