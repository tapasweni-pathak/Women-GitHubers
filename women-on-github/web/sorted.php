<?php
  $dsn = "pgsql:"
    . "host=###############.compute-1.amazonaws.com;"
    . "dbname=##############;"
    . "user=##############;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=##########################";
  $db = new PDO($dsn);
  $query = "SELECT * FROM users ORDER BY login";
  $result = $db->query($query);
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '- ['.trim($row['login']).']('.$row['html_url'].')<br/>';
  }
?>
