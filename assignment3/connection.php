<?php

    // Database credentials
    $user = "a10010035_3";
    $pw = "Toiohomai1234";
    $db = "a10010035_assignment3SCP";
    
    // Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // variable that returns all records in database
    $result = $connection->query("select * from truck");
    
    // check if form data has been send via post
    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        $item = $_POST['item'];
        $class = $_POST['class'];
        $description = $_POST['description'];
        $containment = $_POST['containment'];
        $image = $_POST['image'];
        
        // create a sql insert command
        $insert = "insert into truck(model, heading, tagline, description, image) 
        values('$model', '$heading', '$tagline', '$description', '$image')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record added succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                 <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php'>Return to form</a></p>
            
            ";
        }
    } // end isset post
    
    if(isset($_POST['update']))
    {
        // create variables from our form post data
        $id = $_POST['id'];
        $item = $_POST['item'];
        $class = $_POST['class'];
        $description = $_POST['description'];
        $containment = $_POST['containment'];
        $image = $_POST['image'];
        
        // create a sql update command
        $update = "update subject set item='$item', class='$class', description='$desciption', containment='$containment', image='$image' where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
                 <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record updated succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                 <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error updatiing data</h1>
                <p>{$connection->error}</p>
                <p><a href='update.php'>Return to form</a></p>
            
            ";
        }
    } // end update post
    
    // delete record
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // delete sql command
        $del = "delete from subject where id=$id";
        
        if($connection->query($del) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record Deleted</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
             echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: Red;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error deleting record</h1>
                <p>{$connection->error}</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
  
    

?>