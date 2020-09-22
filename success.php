<pre>
<?php

//FIXA HÄMTNING

  $filename = 'posts.csv';

  //The nested array to hold all the arrays
  $posts = [];
  //skapa ett nytt array item
  $posts[] = ['userId', 'id', 'Title', 'Body'];

  //Open the file for reading
  if ($file_handle = fopen($filename, 'r')) {

    //Read one line from the csv file, use comma as separator
    // while ($data = fgetcsv($hfile_handle, 100, ','))
    while ($data = fgetcsv($file_handle)) {
      //var_dump($data[0]);
      /*fill_post är funktionen som ska skrivas, ska lägga till data till oss. skicka ett isbn in,
      skicka tillbaka arrayen med information
      */
      $posts[] = fill_post($data[0]);
    }

    //Close the file
    fclose($file_handle);
  }

  var_dump($posts);

  //Save code in new file, write
  if ($posts) {
    $filename = 'new_posts.csv';
    $file_to_write = fopen($filename, 'w');
    $everything_is_ok = true;

    foreach ($posts as $post) {
      //$post = fill_post($post[0]);
      //fputcsv($file_to_write, $post);
      $everything_is_ok = $everything_is_ok && fputcsv($file_to_write, $post);
    }

    fclose($file_to_write);
    if ($everything_is_ok) {
      echo '<a href="' . $filename . '">Här är din fil för nedladdning!';
    } else {
      echo 'Nu blev det visst fel';
    }

  }

  function fill_post($info) {
    $post = [];
    $post[0] = $info;
    $post[1] = "lorem ipsum";
    $post[2] = "hej hopp";
    $post[3] = "finimang";


    return $post;
    /*$post[1] = $id;
    $post[2] = $title;
    $post[3] = $body;*/
  }

  //Display the code in a readable format
  //var_dump($posts);


  function get_post_info($info) {
    
  }
?>