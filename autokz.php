<!DOCTYPE html>
<html >
<head>
	<title>Auto Kz</title>
	<style>
		img{	
			width: 666px;
		}
	</style>
</head>
<body>

    <ul>
        <li><a href="autokz.php">Все автомобили</a></li>
        <li><b>Марки:</b></li>
        <ul>
            <li><a href="?brnd=Toyota">Toyota</a></li>
            <li><a href="?brnd=BMW">BMW</a></li>
            <li><a href="?brnd=Ferrari">Ferrari</a></li>
            <li><a href="?brnd=Lamborghini">Lamborghini</a></li>
            <li><a href="?brnd=Mazda">Mazda</a></li>
            <li><a href="?brnd=Pagani">Pagani</a></li>
            <li><a href="?brnd=Lada">Lada</a></li>
        </ul>
        <li><b>Страны:</b></li>
        <ul>
            <li><a href="?cntr=Japan">Japan</a></li>
            <li><a href="?cntr=Russia">Russia</a></li>
            <li><a href="?cntr=Germany">Germany</a></li>
            <li><a href="?cntr=Italy">Italy</a></li>
        </ul>
        <li><b>Категории:</b></li>
        <ul>
            <li><a href="?cat=sedan">Sedan</a></li>
            <li><a href="?cat=sport">Sport</a></li>
            <li><a href="?cat=jdm">JDM</a></li>
            <li><a href="?cat=exotic">Exotic</a></li>
        </ul>
    </ul>

    <?php
    // Проверка наличия файла cars.php
    if (!file_exists('cars.php')) {
        echo "<p style='color:red;'>Ошибка: cars.php не найден!</p>";
    } else {
        include 'cars.php';
        if (!isset($arr) || !is_array($arr) || count($arr) == 0) {
            echo "<p style='color:red;'>Нет данных об автомобилях!</p>";
        } else {
            $filter = false;
            if(isset($_GET['brnd']) && !empty($_GET['brnd'])) {
                $filter = 'brnd';
            } elseif(isset($_GET['cntr']) && !empty($_GET['cntr'])) {
                $filter = 'cntr';
            } elseif(isset($_GET['cat']) && !empty($_GET['cat'])) {
                $filter = 'cat';
            }
            foreach($arr as $car) {
                $show = false;
                if ($filter === 'brnd' && $car['brand'] == $_GET['brnd']) $show = true;
                elseif ($filter === 'cntr' && $car['country'] == $_GET['cntr']) $show = true;
                elseif ($filter === 'cat' && $car['category'] == $_GET['cat']) $show = true;
                elseif (!$filter) $show = true;
                if ($show) {
                    // Исправляем путь к картинке
                    $imgTag = $car['image'];
                    // Исправить src="image/ на src="images/
                    $imgTag = str_replace("src='image/", "src='images/", $imgTag);
                    echo "<hr>";
                    echo $imgTag;
                    echo "<h2>" . htmlspecialchars($car['brand']) . "</h2>";
                    echo "<h3>" . htmlspecialchars($car['model']) . "</h3>";
                    echo "<p>" . htmlspecialchars($car['year']) . "</p>";
                    echo "<p>" . htmlspecialchars($car['country']) . "</p>";
                    echo "<h4>" . htmlspecialchars($car['price']) . "</h4>";
                    echo "<hr>";
                }
            }
        }
    }
    ?>

    <p>
        Footer
    </p>

</body>
</html>