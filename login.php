<!DOCTYPE>
<html>
    <head>
        <title>Login form</title>
    </head>

    <body>

         <?php 

            $flag=false;
            $userNameErr=$successfulMessage=$errorMessage=$passwordErr="";

            if($_SERVER['REQUEST_METHOD']=='POST')
            {
            $userName=test_name($_POST['username']);
            $password=test_name($_POST['password']);

            if(empty($_POST['username']))
            {
                $userNameErr="* User name can not be empty.";
                
            }
            if(empty($_POST['password']))
            {
                $passwordErr="* Password can not be  empty.";
                
                
            }

            $data = file_get_contents("input.txt");
            $tempData = json_decode($data);
            if(!empty($tempData))
            {
                    foreach($tempData as $tempObject)
                {
                    
                    if($tempObject->username==$userName && $tempObject->password==$password)
                    {
                        $flag=true;
                        break;
                    }
                }
            }
            

            if($flag)
            {
                $successfulMessage="log in successful";
            }
            else
            {
                $errorMessage="log in failed";
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
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" >
            
            <h1>Login Form</h1>
            <fieldset>
            <Legend>Log in :</Legend>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><span style="color : red;"><?php echo $userNameErr; ?></span>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern=".{4,}" ><span style="color : red;"><?php echo $passwordErr; ?></span>
                 <br><br>
                <input type="submit" value="submit">
            </fieldset>

        </form>

        <p><a href="Form-Submission.php"><b style="color:red;">Click here</b></a>  for registration.</p>

        <span style =" color : green;"><?php echo "<b>" .$successfulMessage  ."</b>"; ?></span>
         <span style =" color : green;"><?php echo "<b>" .$errorMessage  ."</b>"; ?></span>
       
    </body>
</html>