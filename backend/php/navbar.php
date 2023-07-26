<div id="topnav">
    <a class="abc" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
    <form method="post" action="search.php" id=searchform>
        <input id='searchinput' type="text" placeholder=" Type here to search.." id="searchinput" name='searchval'>
        <input id='searchbutton' type="submit" name="search" value="search">
    </form>
    <a class="abc" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> login</a>
    <a class="abc" href="register.php">Register <i class="fa-solid fa-user-plus" aria-hidden="true"></i></a>
    <a class="abc" href="myorder.php">Order list <i class="fa-solid fa-list"></i></a>
    <a class="abc" href="logout.php">logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
    <a class="abc" href="cartShow.php">Cart <i class="fa-solid fa-cart-shopping"></i></a>
    <?php
    
        if(isset($_COOKIE['admin_username']) && isset($_COOKIE['admin_password']))
        {
            $conn = mysqli_connect("localhost","root","", "ecommers");
            if($conn->connect_error)
            {
                die("connection faild: ".$conn->connect_error);
            }
            $Uname = $_COOKIE['admin_username'];
            $password = $_COOKIE['admin_password'];
            $sql = "SELECT * FROM users WHERE ((user_email='$Uname' or user_mobile ='$Uname') and  user_password='$password')";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)===1) 
            {
               $row = mysqli_fetch_assoc($result);
                if (($row['user_email']=== $Uname || $row['user_mobile']=== $Uname) && $row['user_password']===$password) 
                {
                        $id =  $row['user_id'];
                        $sql = "SELECT * FROM user_personal_details WHERE (user_id=$id )";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)===1) 
                        {
                            $row = mysqli_fetch_assoc($result);
                            $u_p_id = $row['user_personal_id'];
                            $user_name = $row['user_firstname'];
                            echo "<a class='abc' href='address.php?id=$u_p_id' >address <i class='fa-solid fa-cart-shopping'></i></a>";
    
                            echo "<a class='abc'>Wecome $user_name</a>";
                        }
            
                }
            }
            else
            {
                echo "<a class='abc' href='#'>mguest</a>";
        
            }

        }
        else
        {
                echo "<a class='abc' href='login.php'>address <i class='fa-solid fa-cart-shopping'></i></a>";
                echo "<a class='abc' href='#'>guest</a>";
        }
    ?>
    </div>
<br>
<br>