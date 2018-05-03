<?php
function getBooksList()
{
try {
    
    $pdo = new PDO("mysql:host=localhost;dbname=global;charset=UTF8", "germakov", "neto1723");
    $sql = 'SELECT * from books';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && (!empty($_POST['isbn']) || !empty($_POST['name']) || !empty($_POST['author'])) ) 
    {
        $sql = 'SELECT * from books'.' WHERE ';
        $and='';
        
        if(!empty($_POST['isbn']))
        {
            $sql = $sql.'isbn="'.$_POST['isbn'].'"';
            $and=' and ';
        }
       
        if(!empty($_POST['name']))
        {
            $sql = $sql.$and.'name="'.$_POST['name'].'"';
            $and=' and ';
        }
       
        if(!empty($_POST['author']))
        {
          $sql = $sql.$and.'author="'.$_POST['author'].'"';
        }
    }

    foreach($pdo->query($sql) as $row) 
    {
        echo '<tr><td>'.$row['name'].'</td>'.'<td>'.$row['author'].'</td><td>'.$row['year'].'</td>'.'<td>'.$row['genre'].'</td><td>'.$row['isbn'].'</td></tr>';
    }
    
    $pdo = null;
} catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <style>
      table { 
        border-spacing: 0;
        border-collapse: collapse;
      }
      table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
      }
      table th {
        background: #eee;
      }
    </style>
  </head>

  <body>
    <h1>Библиотека успешного человека</h1>
    <form method="POST">
      <input type="text" name="isbn" placeholder="ISBN" value="" />
      <input type="text" name="name" placeholder="Название книги" value="" />
      <input type="text" name="author" placeholder="Автор книги" value="" />
      <input type="submit" value="Поиск" />
    </form>
    <table>
      <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
      </tr>
      <?php
          getBooksList();
      ?>
    </table>
  </body>
</html>
