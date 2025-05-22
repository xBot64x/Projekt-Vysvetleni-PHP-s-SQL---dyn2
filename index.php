<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutoriál</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
           <a href="#"><h3>PHP tutoriál</h3></a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#uvod-php">Úvod do PHP</a></li>
                <li><a href="#promenne">Proměnné</a></li>
                <li><a href="#funkce">Funkce</a></li>
                <li><a href="#operatory">Operátory</a></li>
                <li><a href="#podminky">Podmínky</a></li>
                <li><a href="#cykly">Cykly</a>
                    <ul>
                        <li><a href="#cyklus-for">Cyklus for</a></li>
                        <li><a href="#cyklus-while">Cyklus while</a></li>
                    </ul>
                </li>
                <li><a href="#arraye">Arraye</a>
                    <ul>
                        <li><a href="#indexovany-Array">Indexovaný Array</a></li>
                        <li><a href="#asociativni-Array">Asociativní Array</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>PHP Tutoriál</h1> 
        <a style="text-align:right; width:100%;" href="databaze.php">
            <h2>→ přejít na Databázový tutoriál</h2>
        </a>

        <section id="uvod-php">
            <h2>Co je to PHP a jak ho používat?</h2>
            <p>
                <strong>PHP</strong> (Hypertext Preprocessor) je programovací jazyk určený hlavně pro tvorbu webových stránek na straně serveru(backend). Umožňuje generovat dynamický obsah, pracovat s databázemi a zpracovávat formuláře.
            </p>
            <ul>
                <li>PHP kód se píše mezi značky &lt;?php ... ?&gt;</li>
                <li>PHP běží na serveru a výsledek (HTML) je odeslán uživateli do prohlížeče</li>
                <li>Pro spuštění PHP potřebujete webový server (např. Apache) s nainstalovaným PHP, nebo lokální server (např. <a href="https://www.apachefriends.org">Xampp</a>, <a href="https://www.mamp.info">Mamp</a> nebo <a href="https://laragon.org">Laragon</a>)</li>
            </ul>
            <h3>Příklad jednoduchého PHP kódu:</h3>
            <div class="example">
                <pre>
    <button onclick="copyCode(this)"></button>
&lt;?php
echo "Ahoj světe!";
?&gt;
    </pre>
                <div class="result">
                    <?php
                    echo "Ahoj světe!";
                    ?>
                </div>
                <div class="explanation">
                    Tento kód vypíše text "Ahoj světe!" na stránku. echo slouží k výpisu hodnoty.<br>
                </div>
            </div>
        </section>

        <!-- Proměnné -->
        <section id="promenne">
            <a href="index.php#promenne" class="anchor">
                <h2>Proměnné</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$string = "Hello World";
$int = 42;
$float = 3.14;
$boolean = true;
$array = [1, 2, 3, 4, 5];

echo "String: $string &lt;br&gt;";
echo "Int: $int &lt;br&gt;";
echo "Float: $float &lt;br&gt;";
echo "Boolean: " . ($boolean ? 'true' : 'false') . "&lt;br&gt;";
echo "Array: " . implode(', ', $array);
                </pre>

                <div class="result">
                    <?php
                    $string = "Hello World";
                    $int = 42;
                    $float = 3.14;
                    $boolean = true;
                    $array = [1, 2, 3, 4, 5];

                    echo "String: $string<br>";
                    echo "Int: $int<br>";
                    echo "Float: $float<br>";
                    echo "Boolean: " . ($boolean ? 'true' : 'false') . "<br>";
                    echo "Array: " . implode(', ', $array);
                    ?>
                </div>
            </div>
        </section>

        <!-- Funkce -->
        <section id="funkce">
            <a href="index.php#funkce" class="anchor">
                <h2>Funkce</h2>
            </a>
            <div class="example">
                <form action="index.php#funkce" method="POST">
                    <input type="text" name="jmeno" placeholder="Jméno" value="<?php if (isset($_POST["jmeno"])) {
                                                                                    echo $_POST["jmeno"];
                                                                                } else {
                                                                                    echo "Student";
                                                                                    $_POST["jmeno"] = "Student";
                                                                                } ?>">
                    <input type="submit" value="Spustit" class="run">
                    <input type="submit" value="Spustit Znovu" class="rerun">
                </form>
                <pre>
                <button onclick="copyCode(this)"></button>
function pozdravit($jmeno) { // funkce pro pozdrav, která bere jméno jako argument
    return "Ahoj, $jmeno!";
}

function soucet($a, $b) { // funkce pro součet dvou čísel
    return $a + $b;
}

$jmeno = $_POST["jmeno"];

echo pozdravit($jmeno) . "&lt;br&gt;";
echo "5 + 3 = " . soucet(5, 3);
                </pre>
                <div class="result">
                    <?php
                    function pozdravit($jmeno)
                    { // funkce pro pozdrav, která bere jméno jako argument
                        return "Ahoj, $jmeno!";
                    }

                    function soucet($a, $b)
                    { // funkce pro součet dvou čísel
                        return $a + $b;
                    }

                    $jmeno = $_POST["jmeno"];

                    echo pozdravit($jmeno) . "<br>";
                    echo "5 + 3 = " . soucet(5, 3);
                    ?>
                </div>
            </div>
        </section>

        <!-- Operátory -->
        <section id="operatory">
            <a href="index.php#operatory" class="anchor">
                <h2>Operátory</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$a = 10;
$b = 5;

$soucet = $a + $b;
$rozdil = $a - $b;
$soucin = $a * $b;
$podil = $a / $b;
$zbytek = $a % $b;

echo "Součet: $soucet &lt;br&gt;";
echo "Rozdíl: $rozdil &lt;br&gt;";
echo "Součin: $soucin &lt;br&gt;";
echo "Podíl: $podil &lt;br&gt;";
echo "Zbytek: $zbytek";
                </pre>
                <div class="result">
                    <?php
                    $a = 10;
                    $b = 5;

                    $soucet = $a + $b;
                    $rozdil = $a - $b;
                    $soucin = $a * $b;
                    $podil = $a / $b;
                    $zbytek = $a % $b;

                    echo "Součet: $soucet<br>";
                    echo "Rozdíl: $rozdil<br>";
                    echo "Součin: $soucin<br>";
                    echo "Podíl: $podil<br>";
                    echo "Zbytek: $zbytek";
                    ?>
                </div>
            </div>
        </section>

        <!-- If podmínky -->
        <section id="podminky">
            <a href="index.php#podminky" class="anchor">
                <h2>Podmínky</h2>
            </a>
            <div class="example">
                <form action="index.php#podminky" method="POST">
                    <input type="number" name="vek" placeholder="Věk" value="<?php if (isset($_POST["vek"])) {
                                                                                    echo $_POST["vek"];
                                                                                } else {
                                                                                    echo 20;
                                                                                    $_POST["vek"] = 20;
                                                                                } ?>">
                    <input type="submit" value="Spustit" class="run">
                    <input type="submit" value="Spustit Znovu" class="rerun">
                </form>
                <pre>
                <button onclick="copyCode(this)"></button>
$age = $_POST["vek"];

if ($age < 18) {
    $message = "Jsi dítě";
} elseif ($age >= 18 && $age < 65) {
    $message = "Jsi dospělý";
} else {
    $message = "Jsi starý";
}

echo $message;
                </pre>
                <div class="result">
                    <?php
                    $age = $_POST["vek"];

                    if ($age < 18) {
                        $message = "Jsi dítě";
                    } elseif ($age >= 18 && $age < 65) {
                        $message = "Jsi dospělý";
                    } else {
                        $message = "Jsi starý";
                    }

                    echo $message;
                    ?>
                </div>
            </div>
        </section>

        <!-- cykly -->
        <section id="cykly">
            <a href="index.php#cykly" class="anchor">
                <h2>Cykly</h2>
            </a>
            <div class="example">
                <a href="index.php#cyklus-for" class="anchor2">
                    <h3 id="cyklus-for">Cyklus for</h3>
                </a>
                <form action="index.php#cyklus-for" method="POST">
                    <input type="number" name="opakovani" placeholder="Počet opakování" value="<?php if (isset($_POST["opakovani"])) {
                                                                                                    echo $_POST["opakovani"];
                                                                                                } else {
                                                                                                    echo 5;
                                                                                                    $_POST["opakovani"] = 5;
                                                                                                } ?>" min="-5" max="15">
                    <input type="submit" value="Spustit" class="run">
                    <input type="submit" value="Spustit Znovu" class="rerun">
                </form>
                <pre>
                <button onclick="copyCode(this)"></button>
for ($i = 1; $i <= $_POST["opakovani"]; $i++) {
    echo "Opakování $i &lt;br&gt;";
}
                </pre>
                <div class="result">
                    <?php
                    if (abs($_POST["opakovani"]) > 15) {
                        $_POST["opakovani"] = 15;
                    }
                    for ($i = 1; $i <= $_POST["opakovani"]; $i++) {
                        echo "Opakování $i <br>";
                    }
                    ?>
                </div>

                <a href="index.php#cyklus-while" class="anchor2">
                    <h3 id="cyklus-while">Cyklus while</h3>
                </a>
                <form action="index.php#cyklus-while" method="POST">
                    <input type="number" name="opakovani2" placeholder="Počet opakování" value="<?php if (isset($_POST["opakovani2"])) {
                                                                                                    echo $_POST["opakovani2"];
                                                                                                } else {
                                                                                                    echo 3;
                                                                                                    $_POST["opakovani2"] = 3;
                                                                                                } ?>" min="-5" max="15">
                    <input type="submit" value="Spustit" class="run">
                    <input type="submit" value="Spustit Znovu" class="rerun">
                </form>
                <pre>
                <button onclick="copyCode(this)"></button>
$count = 0;
while ($count < $_POST["opakovani2"]) {
    echo "Opakování $count &lt;br&gt;";
    $count++;
}
                </pre>
                <div class="result">
                    <?php
                    if (abs($_POST["opakovani2"]) > 15) {
                        $_POST["opakovani2"] = 15;
                    }
                    $count = 0;
                    while ($count < $_POST["opakovani2"]) {
                        echo "Opakování $count<br>";
                        $count++;
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Arraye -->
        <section id="arraye">
            <a href="index.php#arraye" class="anchor">
                <h2>Arraye</h2>
            </a>
            <div class="example">
                <a href="index.php#indexovany-Array" class="anchor2">
                    <h3 id="indexovany-Array">Indexovaný Array</h3>
                </a>
                <pre>
                <button onclick="copyCode(this)"></button>
$ovoce = ["Jablko", "Banán", "Pomeranč"];

foreach ($ovoce as $i) {
    echo "$i &lt;br&gt;";
}
                </pre>
                <div class="result">
                    <?php
                    $ovoce = ["Jablko", "Banán", "Pomeranč"];

                    foreach ($ovoce as $i) {
                        echo "$i<br>";
                    }
                    ?>
                </div>
                <div class="explanation">
                    Indexované pole (indexed array) je základní typ pole v PHP, kde jsou prvky uloženy v pořadí a přístupné pomocí číselných indexů. Indexy začínají od 0 a postupně se zvyšují.<br><br>

                    <strong>Jak vytvořit indexované pole:</strong><br>
                    - Použijte hranaté závorky [] nebo funkci array() - $ovoce = array("Jablko", "Banán", "Pomeranč");<br>
                    - Prvky se automaticky indexují od 0<br>
                    - Můžete přidávat prvky pomocí [] nebo array_push()<br><br>

                    <strong>změna obsahu na indexu (Změní Banán na Ananas)</strong><br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
$ovoce[1] = "Ananas";
                    </pre><br>
                    <strong>Přidání hodnoty</strong><br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
$ovoce[] = "Mango";
                    </pre><br>
                    <strong>Odstranění hodnoty pomocí array_splice</strong><br>
                    Vybereme index a kolik hodnot chceme odstranit<br>
                    Array bude přeindexován<br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
array_splice($ovoce, 1, 1);
                    </pre><br>
                    <strong>Odstranění hodnoty pomocí unset</strong><br>
                    Vybereme index<br>
                    Array nebude přeindexován, to znamená že bude chybět smazaný index<br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
unset($ovoce[1]);
                    </pre>
                </div>

                <a href="index.php#asociativni-Array" class="anchor2">
                    <h3 id="asociativni-Array">Asociativní Array</h3>
                </a>
                <pre>
                <button onclick="copyCode(this)"></button>
$clovek = [
    "jmeno" => "Pepa",
    "vek" => 30,
    "mesto" => "Olomouc"
];

foreach ($clovek as $key => $value) {
    echo "$key: $value&lt;br&gt;";
}
                </pre>
                <div class="result">
                    <?php
                    $clovek = [
                        "jmeno" => "Pepa",
                        "vek" => 30,
                        "mesto" => "Olomouc"
                    ];

                    foreach ($clovek as $key => $value) {
                        echo "$key: $value<br>";
                    }
                    ?>
                </div>
                <div class="explanation">
                    Asociativní pole (associative array) je speciální typ pole v PHP, kde každý prvek má svůj vlastní klíč (key) a hodnotu (value). Na rozdíl od běžných indexovaných polí, kde jsou klíče čísla (0, 1, 2...), v asociativních polích můžete použít vlastní textové klíče.<br><br>
                    <strong>Jak vytvořit asociativní pole:</strong><br>
                    - Použijte hranaté závorky [] nebo funkci array()<br>
                    - Každý prvek má formát "klíč" => "hodnota"<br>
                    - Klíče mohou být řetězce nebo čísla<br><br>
                    <strong>Přístup k hodnotám:</strong><br>
                    Hodnotu získáte pomocí klíče, např. $clovek["jmeno"] vrátí "Pepa".<br><br>
                    <strong>Přidání nebo změna hodnoty:</strong><br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
$clovek["prace"] = "Programátor"; // přidá nový klíč nebo změní hodnotu existujícího klíče
                    </pre><br>
                    <strong>Odstranění hodnoty:</strong><br>
                    <pre>
                        <button onclick="copyCode(this)"></button>
unset($clovek["vek"]); // odstraní prvek s klíčem "vek"
                    </pre><br>
                    <strong>Procházení asociativního pole:</strong><br>
                    Nejčastěji pomocí cyklu foreach, kde získáte jak klíč, tak hodnotu.<br>
                </div>

            </div>
        </section>
        <a style="text-align:right; width:100%;" href="databaze.php">
            <h2>→ přejít na Databázový tutoriál</h2>
        </a>
    </div>
    <br>
    <?php include_once 'php/footer.php'; ?>
</body>
<script src="js/script.js"></script>

</html>