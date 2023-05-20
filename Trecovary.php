<?php
    function Trecovary()
    {
        global $email;
        global $conn;
        $query = "SELECT * FROM users WHERE email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['email'] === $email)
                    {
                        echo '<h3 style="color:red;">Your account has been successfully recovered.</h3>
                            <p style=\"font-size:130%;\">
                                <b>Username: </b>' . $user_data['username'] . '<br>
                                <b>Password: </b>' . $user_data['password'] . '<br>
                                <b>Email: </b>' . $user_data['email'] . '
                            </p>
                             ';       
                        $conn->close();
                        return;
                    }
                    
                }
            }
            echo '<p style="color:red;">Wrong email. Please try again.</p>';
    }