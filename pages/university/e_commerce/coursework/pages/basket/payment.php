<?php
    // set the root folder (site root not server root) in relation to this page
    $path = "../../";

    // every page can have a different title
    $page_title = "Checkout";

    // connect to php_header
    include($path."assets/includes/php_header.php");    

    //header include
    include($path."assets/includes/header.php");
	
	$loggedMember_id = $_SESSION['e_commerce_username'];
	$total_amount = $_SESSION['total_price'];
	
	$card_holder_name = $_POST['card_holder_name_txtbox'];
	$card_number = $_POST['card_number_txtbox'];
	$expire_month = $_POST['month_txtbox'];
	$expire_year = $_POST['year_txtbox'];
	$security_code = $_POST['security_code_txtbox'];
	
	$insert_error = false;
    $error = false;
    
    $time = date("Y-m-d H:i:s");
    $shipping_name = $_POST['shipping_name_txtbox'];
    $shipping_surname = $_POST['shipping_surname_txtbox'];
    $shipping_address = $_POST['shipping_address_txtbox'];
    $shipping_postcode = $_POST['shipping_postcode_txtbox'];
            
        //if shipping name is empty
        if($shipping_name == "")
        {
            echo '<h5>Shipping First Name is empty!</h5>';
            //an error occured
            $error = true;
        }

        //if shipping name is too small or contains illegal characters
        else if (!preg_match("/[a-zA-Z][a-zA-Z]+/", $shipping_name))
        {
            echo '<h5>Shipping First Name is too small or contains illegal characters!</h5>';
            //an error occured
            $error = true;
        }
            
        //if shipping surname is empty
        if($shipping_surname == "")
        {
            echo '<h5>Shipping Last Name is empty!</h5>';
            //an error occured
            $error = true;
        }

        //if shipping surname is too small or contains illegal characters
        else if (!preg_match("/[a-zA-Z][a-zA-Z]+/", $shipping_surname))
        {
            echo '<h5>Shipping Last Name is too small or contains illegal characters!</h5>';
            //an error occured
            $error = true;
        }
            
        //if shipping address is empty
        if($shipping_address == "")
        {
            echo '<h5>Shipping address is empty!</h5>';
            //an error occured
            $error = true;
        }
        //if shipping address is too small
        else if (strlen($shipping_address) <= 10)
        {
            echo '<h5>Shipping address is too small!</h5>';
            //an error occured
            $error = true;
        }
            
        //if shipping postcode is empty
        if($shipping_postcode == "")
        {
            echo '<h5>Shipping postcode is empty!</h5>';
            //an error occured
            $error = true;
        }
        
        //if shipping postcode is too small
        else if (strlen($shipping_postcode) < 5)
        {
            echo '<h5>Shipping postcode is too small!</h5>';
            //an error occured
            $error = true;
        }
            
        //if card holder name is empty
        if($card_holder_name == "")
        {
            echo '<h5>Card holder name is empty!</h5>';
            //an error occured
            $error = true;
        }
        
        //if card holder name is too small or contains illegal characters
        else if (!preg_match("/[a-zA-Z][a-zA-Z]+/", $card_holder_name))
        {
            echo '<h5>Card holder name is too small or contains illegal characters!</h5>';
            //an error occured
            $error = true;
        }
        
        //if card number is empty
        if($card_number == "")
        {
            echo '<h5>Card number is empty!</h5>';
            //an error occured
            $error = true;
        }

        //if card number not in correct format (must be only numbers and 16 digits long)
        else if(!preg_match("/[0-9]{16}/", $card_number))
        {
            echo '<h5>Card number not in correct format!</h5>';
            //an error occured
            $error = true;
        }
        
        //if card expire month is empty
        if(!($expire_month >0 && $expire_month<13))
        {
            echo '<h5>Card expire Month is invalid!</h5>';
            //an error occured
            $error = true;
        }
        
        //if month is empty
        if(!($expire_year>=2012 && $expire_year<=2022))
        {
            echo '<h5>Card expire Year is invalid!</h5>';
            //an error occured
            $error = true;
        }
        
        //if security code is empty
        if($security_code == "")
        {
            echo '<h5>Security code is empty!</h5>';
            //an error occured
            $error = true;
        }
        //if security code not in correct format (must be only numbers and 3 digits long)
        else if(!preg_match("/[0-9]{3}/", $security_code))
        {
            echo '<h5>Security code not in correct format!</h5>';
            //an error occured
            $error = true;
        }
        
        //if an error has occured on validations above
        if($error == true)
        {
            echo '<h3>Please go back and fill in the mandatory fields.</h3>';
            echo '<div><a href="'.$path.'pages/basket/checkout.php">&laquo;Back</a></div>
                </div>';
        }
        
        //if no error occured
        else
        {   
            //Create query to insert into bookshopOrder table
            $query_insert_order = "INSERT INTO ecom_order (username, date_time, total_amount, ship_fname, ship_lname, ship_address,
            ship_postcode) VALUES ('$loggedMember_id', '$time', $total_amount, '$shipping_name', '$shipping_surname', '$shipping_address', 
            '$shipping_postcode')";

            //Execute query
            $result_insert_order = mysqli_query($connection, $query_insert_order)
                or die(mysqli_error($connection));

            
            //returns the AUTO_INCREMENT ID generated from the previous INSERT operation
            $last_inserted = mysqli_insert_id($connection);
            
            //for each product in the cart
            foreach ($_SESSION['cart'] as $prodid => $qty)
            {
                //Create query to insert into bookshopOrderItem table
                $query_insert_orderProduct = "INSERT INTO ecom_order_item (main_order, product, quantity)
                                            VALUES ($last_inserted, '$prodid', $qty)";

                //Execute query
                $result_insert_orderProduct = mysqli_query($connection, $query_insert_orderProduct)
                    or die(mysqli_error($connection));
                
                //if an occur occured in the update
                if(!($result_insert_orderProduct))
                {
                    $insert_error = true;
                }
            }

            //if insert operations successfully completed
            if ($result_insert_order && !$insert_error)
            {
                //update error
                $update_error = false;
            
                //decrease the availability (stock) of each product bought
                foreach ($_SESSION['cart'] as $prodid => $qty)
                {
                    //Create query to update into Product table
                    $query_products_update = "UPDATE ecom_product SET qty = qty - $qty WHERE id = '$prodid'";
                
                    //execute query
                    $result_products_update = mysqli_query($connection, $query_products_update)
                        or die(mysqli_error($connection));
                
                    //if an occur occured in the update
                    if(!$result_products_update)
                    {
                        $update_error = true;
                    }
                }
                    
                //if not error occured on the update operations above
                if(!$update_error)
                {
                    echo '<h4> Your order has been processed.</h4>';
                    echo '<a href="'.$path.'index.php">Home</a>';
                
                    //unset the cart, items and total price from session
                    unset($_SESSION['cart']);
                    unset($_SESSION['items']);
                    unset($_SESSION['total_price']);
                }
                //something went wrong to the update operations
                else
                {   
                    echo 'An error occured! Order was not successful because '.mysqli_error($connection);
                
                    echo '<h3>Please try again.</h3>';
                    echo '<a href="'.$path.'pages/basket/checkout.php">&laquo;Back</a>';
                }
            }
            //something went wrong with the insert operations
            else
            {   
                echo 'An error occured! Order was not successful because '.mysqli_error($connection);
                
                echo '<h3>Please try again.</h3>';
                echo '<a href="'.$path.'pages/basket/checkout.php">&laquo;Back</a>';
            }
        }

        
    //login include
    include($path."assets/includes/login.php");

    //footer include
    include($path."assets/includes/footer.php");
?>