<?php
  /* $_POST is an array (set of values with one name and lots of data)
     that stores the data supplied by the user in a form.
     The "key" or index in the array is the name attribute in the html form.
  */
  echo $_POST["studentName"] . "<br />";
  echo $_POST["teacherName"] . "<br />";
  echo $_POST["progLanguage"] . "<br />";  
?>