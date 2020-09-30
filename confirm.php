<?php
  include "includes/header.php";
  require_once('class/csv.php');

  $csv = new Upload();
  $csv2 = new Download();

  $file_name = $csv->getLatestFile();
  $path_upl = $csv->getPath();

  $path_dow = $csv2->getPath();
?>

<div class="container">
  <?php
  //Create books array
    $posts = [];
    //$books[] = ['ISBN', 'Book title', 'Publish Year', 'Id'];
    $posts[] = ['*','Id', 'Användare', 'Titel' , 'Text'];
    // Open the file for reading
    if ($file_handle = fopen($path_upl . $file_name, 'r'))
    {
      // Read one line from csv file, use comma as separator
      while ($data = fgetcsv($file_handle, 0, ','))
      {
          $posts[] = $csv->fill_post($data[0]);
      }
      fclose($file_handle);
    }
    if ($posts)
    {
      $filename = $path_dow . 'updated_' . "$file_name";
      $file_to_write = fopen($filename, 'w');
      $everything = true;
      foreach ($posts as $post)
      {
          $everything = $everything && fputcsv($file_to_write, $post);
      }
      fclose($file_to_write);
  ?>
  <div class="output">
    Din hämtade information
    <br>
    <?php
      if ($everything)
      {
        echo '<a class="download_file" href= "' . $filename . '" download>Här laddar du ned din CSV-fil</a>';
      } else {
        echo 'Something went wrong';
        }
      }
    ?>
    <div class="table_output">
      <?php
        $file_details = $csv2->showFile();
        echo $file_details;
      ?>
    </div>
  </div>
</div>