<?php
require_once('./class/db.php');

class Api {
    private $writeFile = 'downloadFile.csv';
    private $db;
    protected $posts = [];
    public $postsNotFound = [];

    // Sets up a connection to the database and adds some items to the books array
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
        $this->posts[] = ['userId', 'id', 'title', "body"];
    }
    // The function takes the uploaded file as the parameter
    public function getPosts($filename)
    {
        // if the file is readable do something
        if ($file_handle = fopen($filename, 'r')) {
            // reads the rows from the file for every item in the array, send the content to the "fill_book" function.
            // and then puts the response in to an array called readBook.
            while ($data = fgetcsv($file_handle)) {
                $readPost = $this->fill_post($data[0]);
                // If the values is in an array format, set the readBooks array to the general books array and then closes the file and returns the general books array
                if (is_array($readPost)) {
                    $this->posts[] = $readPost;
                }
            }
            fclose($file_handle);
            return $this->posts;
        }
    }

    /*
    The fill_book function takes in an isbn number that is set from the uploaded file.
    casts a curl to the selected website(api) with the current isbn number and returns the answer.
    Explodes out the "var_dump" that is set and then decodes the json to a valid array.

    if the isbn number has a null response from the curl. Then insert the isbn number to the booksNotFound variable.
    If not, return the information to a variable called book and return it to the main function.

    */
    public function fill_post($info)
    {
        $post = [];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts?userId" . $userid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $postInfo = curl_exec($ch);
        curl_close($ch);

        $answer = explode('{', $postInfo);
        $answer = "{" . $answer[1];
        $answer = json_decode($answer, true);
        if (!is_null($answer['userId'])) {
            $post[0] = $answer['userId'];
            $post[1] = $answer['id'];
            $post[2] = $answer['title'];
            $post[3] = $answer['body'];
            return $post;
        } else {
            $this->postsNotFound[] = $info;
        }
    }

?>