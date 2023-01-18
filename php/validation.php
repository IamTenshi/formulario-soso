<?php 
    //Validate DNI
    if (!empty($DNI)) {
        //Check if the is a DNI with tha same number in the database
        $DNI_user_check_query = "SELECT * FROM user WHERE dni = '$DNI' LIMIT 1";
        $DNI_result = mysqli_query($conn, $DNI_user_check_query);
        $user = mysqli_fetch_assoc($DNI_result);
    
        if ($user) {
            if ($user['dni'] === $DNI) {
                array_push($errors, "DNI already exists");
                echo '
                    <script>
                        alert("DNI already exists");
                        window.location = "../index.html";
                    </script>
                ';
            }
        }

        elseif (strlen($DNI) < '11') {
            array_push($errors, "Your DNI must contain at least 11 characters");
            echo '
                <script>
                    alert("Your DNI must contain at least 11 characters!");
                    window.location = "../index.html";
                </script>
            ';
        }

        elseif(!preg_match("#[0-9]+#",$DNI)) {
            array_push($errors, "Your DNI just can contain only numbers");
            echo '
                <script>
                    alert("Your DNI just can contain only numbers!");
                    window.location = "../index.html";
                </script>
            ';
        }
        
    } else {
        array_push($errors, 'The DNI cannot be empty');
        echo '
            <script>
                alert("The DNI cannot be empty");
                window.location = "../index.html";
            </script>
        ';
    }
?>