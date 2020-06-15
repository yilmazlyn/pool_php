<html>
  <body>

<?php

if (isset($_GET["name"]))
{
  $name = $_GET["name"];
}


else
{
  $name = "platypus";
}
echo "Hello " . $name;
 ?>
</body>
</html>
