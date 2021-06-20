<!DOCTYPE>
<html>
    <head>
        <title>Login form</title>
    </head>

    <body>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" >
                <h1>Login Form</h1>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" >
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern=".{4,}" > 
                 <br><br>
                <input type="submit" value="submit">


        </form>
        <?php 

                $flag=false;

                
        
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $userName=test_name($_POST['username']);
                $password=test_name($_POST['password']);

                $data = file_get_contents("input.txt");
                $tempData = json_decode($data);
                
                foreach($tempData as $tempObject)
                {
                    
                    if($tempObject->username==$userName && $tempObject->password==$password)
                    {
                        $flag=true;
                        break;
                    }
                }

            if($flag)
            {
                echo "Correct";
            }
            else
            {
                echo "failed";
            }

            }


            function test_name($data)
            {
                $data=trim($data);
                $data=stripcslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }

        ?>
    </body>
</html>