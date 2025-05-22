<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutoriál - databáze</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
           <a href="#"><h3>Databázový tutoriál</h3></a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#uvod-databaze">Úvod do databáze</a></li>
                <li><a href="#pripojeni">Připojení k databázi v PHP</a></li>
                <li><a href="#vytvoreni-tabulky">Vytvoření tabulky</a></li>
                <li><a href="#vkladani-dat">Vkládání dat</a></li>
                <li><a href="#vyber-dat">Výběr dat</a></li>
                <li><a href="#update-dat">Úprava dat</a></li>
                <li><a href="#delete-dat">Mazání dat</a></li>
                <li><a href="#prepared-statements">Prepared Statements</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>PHP databázový Tutoriál</h1> 
        <a style="text-align:right; width:100%;" href="index.php">
            <h2>→ přejít na PHP tutoriál</h2>
        </a>

        <section id="uvod-databaze">
            <h2>Co je databáze a proč ji používat v PHP?</h2>
            <p>
                <strong>Databáze</strong> je systém pro ukládání, správu a vyhledávání dat. V PHP se nejčastěji používá databáze MySQL nebo MariaDB. Databáze umožňuje ukládat data (například uživatele, produkty, objednávky) a efektivně s nimi pracovat.<br><br>
                <strong>Proč používat databázi?</strong>
            <ul>
                <li>Ukládání většího množství dat</li>
                <li>Snadné vyhledávání a filtrování</li>
                <li>Bezpečnost a správa přístupů</li>
                <li>Možnost propojení více tabulek</li>
            </ul>
            <strong>Jak se propojit s databází:</strong>
            <ul>
                <li>Potřebujete MySQL databázi, ta může být lokální, nebo na serveru</li>
                <li>Pro lokální databázi se dá využít např. <a href="https://www.apachefriends.org">Xampp</a>, <a href="https://www.mamp.info">Mamp</a> nebo <a href="https://laragon.org">Laragon</a></li>
                <li>Pro přístup k databázi se využívá phpmyadmin nebo jiné prostředí</li>
                <li>Příkazy pro správu databáze jsou v jazyku SQL</li>
            </ul>
            </p>

        </section>

        <!-- Propojení s databází -->
        <section id="pripojeni">
            <a href="#pripojeni" class="anchor">
                <h2>Připojení k databázi v PHP</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moje_databaze";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}
echo "Připojeno úspěšně";
                </pre>
                <div class="result">
                    <?php
                    require_once 'includes/db.php';
                    echo "Připojeno úspěšně";
                    ?>
                </div>
                <div class="explanation">
                    K připojení k databázi použijte třídu mysqli. Pokud je připojení úspěšné, můžete pokračovat v práci s databází.<br>
                </div>
            </div>
        </section>

        <!-- Vytvoření tabulky -->
        <section id="vytvoreni-tabulky">
            <a href="#vytvoreni-tabulky" class="anchor">
                <h2>Vytvoření tabulky v databázi</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$sql = "CREATE TABLE uzivatele (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    jmeno VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    vek INT
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabulka byla vytvořena.";
} else {
    echo "Chyba: " . $conn->error;
}
                </pre>
                <div class="result">
                    <?php
                    echo "Tabulka byla vytvořena.";
                    ?>
                </div>
                <div class="explanation">
                    Tabulku vytvoříte pomocí SQL příkazu CREATE TABLE. Každý sloupec má svůj datový typ.<br>
                </div>
            </div>
        </section>

        <!-- Vkládání dat -->
        <section id="vkladani-dat">
            <a href="#vkladani-dat" class="anchor">
                <h2>Vkládání dat do tabulky</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$sql = "INSERT INTO uzivatele (jmeno, email, vek) VALUES ('Pepa', 'pepa@email.cz', 25)";

if ($conn->query($sql) === TRUE) {
    echo "Nový záznam byl přidán.";
} else {
    echo "Chyba: " . $conn->error;
}
                </pre>
                <div class="result">
                    <?php
                    echo "Nový záznam byl přidán.";
                    ?>
                </div>
                <div class="explanation">
                    Data vložíte pomocí SQL příkazu INSERT INTO.<br>
                </div>
            </div>
        </section>

        <!-- Výběr dat -->
        <section id="vyber-dat">
            <a href="#vyber-dat" class="anchor">
                <h2>Výběr dat z tabulky</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$sql = "SELECT id, jmeno, email, vek FROM uzivatele";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Jméno: " . $row["jmeno"] . ", Email: " . $row["email"] . ", Věk: " . $row["vek"] . "<br>";
    }
} else {
    echo "Žádné záznamy nenalezeny.";
}
                </pre>
                <div class="result">
                    <?php
                    // Bezpečný výběr dat
                    $stmt = $conn->prepare("SELECT id, jmeno, email, vek FROM uzivatele");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "ID: " . htmlspecialchars($row["id"]) . ", Jméno: " . htmlspecialchars($row["jmeno"]) . ", Email: " . htmlspecialchars($row["email"]) . ", Věk: " . htmlspecialchars($row["vek"]) . "<br>";
                        }
                    } else {
                        echo "Žádné záznamy nenalezeny.";
                    }
                    ?>
                </div>
                <div class="explanation">
                    Pro výběr dat použijte SQL příkaz SELECT a výsledek zpracujte cyklem while.<br>
                </div>
            </div>
        </section>

        <!-- Úprava dat -->
        <section id="update-dat">
            <a href="#update-dat" class="anchor">
                <h2>Úprava dat v tabulce</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$sql = "UPDATE uzivatele SET vek=26 WHERE jmeno='Pepa'";

if ($conn->query($sql) === TRUE) {
    echo "Záznam byl upraven.";
} else {
    echo "Chyba: " . $conn->error;
}
                </pre>
                <div class="result">
                    <?php
                    echo "Záznam byl upraven.";
                    ?>
                </div>
                <div class="explanation">
                    Úpravu dat provedete pomocí SQL příkazu UPDATE.<br>
                </div>
            </div>
        </section>

        <!-- Mazání dat -->
        <section id="delete-dat">
            <a href="#delete-dat" class="anchor">
                <h2>Mazání dat z tabulky</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$sql = "DELETE FROM uzivatele WHERE jmeno='Pepa'";

if ($conn->query($sql) === TRUE) {
    echo "Záznam byl smazán.";
} else {
    echo "Chyba: " . $conn->error;
}
                </pre>
                <div class="result">
                    <?php
                    echo "Záznam byl smazán.";
                    ?>
                </div>
                <div class="explanation">
                    Mazání dat provedete pomocí SQL příkazu DELETE.<br>
                </div>
            </div>
        </section>

        <!-- Bezpečnost: Prepared Statements -->
        <section id="prepared-statements">
            <a href="#prepared-statements" class="anchor">
                <h2>Bezpečné dotazy: Prepared Statements</h2>
            </a>
            <div class="example">
                <pre>
                <button onclick="copyCode(this)"></button>
$stmt = $conn->prepare("INSERT INTO uzivatele (jmeno, email, vek) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $jmeno, $email, $vek);

$jmeno = "Jarek";
$email = "jarek@email.cz";
$vek = 48;
$stmt->bind_param("ssi", $jmeno, $email, $vek);
if ($stmt->execute()) {
    echo "Nový záznam byl přidán.";
} else {
    echo "Chyba: " . $stmt->error;
}
                </pre>
                <div class="result">
                    <?php
                    echo "Nový záznam byl přidán.";
                    ?>
                </div>
                <div class="explanation">
                    Prepared Statements chrání před SQL injection a jsou doporučený způsob práce s databází.<br>
                </div>
            </div>
        </section>
        <a style="text-align:right; width:100%;" href="index.php">
            <h2>→ přejít na PHP tutoriál</h2>
        </a>
    </div>
    <br>
    <?php include_once 'php/footer.php'; ?>
</body>
<script src="js/script.js"></script>

</html>