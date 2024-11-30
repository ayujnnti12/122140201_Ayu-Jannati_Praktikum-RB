<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'data_posyandu';

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk menghitung total data
$resultTotal = $conn->query("SELECT COUNT(*) AS total FROM posyandu");
$totalData = $resultTotal->fetch_assoc()['total'];
$totalPages = ceil($totalData / $limit);

// Query untuk mengambil data dengan limit dan offset
$sql = "SELECT * FROM posyandu LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posyandu</title>
    <link rel="stylesheet" href="122140201_Ayu Jannati.css">
</head>
<body>
    <h1>Data Posyandu</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Balita</th>
            <th>Nama Ibu</th>
            <th>Usia Balita (Bulan)</th>
            <th>Berat Badan (kg)</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = $offset + 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_balita']}</td>
                        <td>{$row['nama_ibu']}</td>
                        <td>{$row['usia_balita']}</td>
                        <td>{$row['berat_badan']}</td>
                      </tr>";
                $no++;
            }
        }

        for ($i = $result->num_rows; $i < $limit; $i++) {
            echo "<tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>";
        }
        ?>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Selanjutnya</a>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>