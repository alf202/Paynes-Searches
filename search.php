<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paynes Searches - Search Results</title>
    <style>
    a:link, a:visited {
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a:hover, a:active {
    background-color: red;
}
body {
  font-family: Verdana
}
</style>
</head>
<body>
<left><img src="Logo1.png" height="200"></left>
       <form action='./search.php' method='get'>
           <input type="text" name="k" size="50" value='<?php echo $_GET ['k']; ?>' />
           <input type='submit' value='Search' />
       </form>
        <hr />
        <?php
            $i = 0;
            $k = $_GET['k'];
            $terms =  explode (" ", $k);
            $query = "SELECT * FROM search WHERE ";

            foreach ($terms as $each) {
                $i++;

                 if ($i == 1)
                    $query .= "keywords LIKE '%$each%' ";
                else
                    $query .= "OR keywords LIKE '%$each%' ";

            }
            

            mysql_connect("mysql.hostinger.co.uk", "u951432186_engin", "Summer129");
            mysql_select_db("u951432186_engin");

            $query = mysql_query($query);
            $numrows = mysql_num_rows($query);
            if ($numrows > 0){
            while ($row = mysql_fetch_assoc($query)){
              $id = $row['id'];
              $title = $row['title'];
              $description = $row['description'];
              $keywords = $row['keywords'];
              $link = $row['link'];


              echo "<h2><a href='$link'>$title</a></h2>
              $description <br /><br />";

            }

            }

            else
            echo "No results found for \"<b>$k</b>\"";
            mysql_close();
        ?>
</body>
</html>