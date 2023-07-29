<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Notes</title>
</head>

<body>
  <div class="App">
    <!-- Navbar -->
    <?php
    session_start();
    ?>

    <div class="Navbar">
      <div class="Navbar--Header">
        <h1 class="header">
          <?php echo $_SESSION["name"]; ?>
        </h1>
      </div>
      <button onClick="window.location.replace('logout.php');">Logout</button>
    </div>


    <!-- Search -->
    <?php
    echo "<div class='Search'>
      <input class='search--input' onChange='searchParams(this.value);' type='text' value='" . (isset($_GET['search']) ? $_GET['search'] : "") . "'
      placeholder='Search for your notes...' />
    </div>";
    ?>

    <div class="Notes">
      <!-- Add Note -->
      <form class="Note" method="POST" action="insertNote.php">
        <div class="Note--Card">
          <input required type="text" class="Add--Title" placeholder="Enter Title" name="title" />
          <div class="para">
            <textarea required placeholder="Type your note here" name="text"></textarea>
          </div>
          <span class="dateBox"><input required class="date" type="date" name="date"></span>
          <button type="submit" class="Add">Add Note</button>
        </div>
      </form>

      <!-- Saved Notes -->
      <?php
      $searchQuery = "";
      if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
      }

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "notes";
      $tableName = "note";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM $tableName WHERE email='" . $_SESSION['email'] . "' AND (title LIKE '%$searchQuery%' OR text LIKE '%$searchQuery%')";
      $ds = $conn->query($sql);

      if ($ds && $ds->num_rows > 0) {
        while ($row = $ds->fetch_assoc()) {
          echo "<div class='Note'>
            <div class='Note--Card'>
                <h1 class='Note--Title'>" . $row['title'] . "</h1>
                <div class='para'>
                    <textarea readonly>" . $row['text'] . "</textarea>
                </div>
                <span class='dateBoxSave'>Date: " . $row['date'] . "</span>
                <button class='delete' onClick='validateAction(" . $row['id'] . ")'>Delete Note</button>
            </div>
        </div>";
        }
      }
      ?>

    </div>
  </div>

  <script>
    document.body.style.backgroundImage = `url(${"light.jpg"})`;

    function validateAction(id) {
      var confirmed = confirm("Are you sure you want to delete this note?");
      if (confirmed) {
        window.location.href = "deleteNote.php?id=" + id;
      }
    }

    function searchParams(value) {
      var url = new URL(window.location.href);
      url.searchParams.set('search', value);
      window.location.href = url.toString();
    }
  </script>
</body>

</html>