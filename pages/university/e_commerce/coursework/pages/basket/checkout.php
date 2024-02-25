<?php
	// set the root folder (site root not server root) in relation to this page
	$path = "../../";

	// every page can have a different title
	$page_title = "Checkout";

	// connect to php_header
	include($path."assets/includes/php_header.php");	

	//header include
	include($path."assets/includes/header.php");						

        //if a customer logged in
	    if (isset($_SESSION['e_commerce_username']))
		{
			//if the cart not empty
			if(!empty($_SESSION["cart"]))	
			{
				$query = "SELECT * FROM ecom_user WHERE username = '".$_SESSION['e_commerce_username']."'";
				$result = mysqli_query($connection, $query) or die(mysqli_error());

				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
	    		  		echo "<h3>Shipping information</h3>";
						
						echo	'<form name="checkout" method="post"  action= "payment.php">
								<table class="FormTable" cellspacing="0" summary="Checkout Form">
								<tbody>';
								
						echo	'<tr>
								  <td class="Col1"><label>First name:</label><span class="Asterisk">*</span></td>
								  <td><div class="cleaner_with_width">&nbsp;</div></td>
								  <td><input class="Col2" name="shipping_name_txtbox" type="text" value = "'.$row['first_name'].'" maxlength="15" /></td>
								 </tr>';
								 
						echo	'<tr>
								  <td class="Col1"><label>Last name:</label><span class="Asterisk">*</span></td>
								  <td><div class="cleaner_with_width">&nbsp;</div></td>
								  <td><input class="Col2" name="shipping_surname_txtbox" type="text" value = "'.$row['last_name'].'" maxlength="40" /></td>
								 </tr>';
								 
						echo	'<tr>
								  <td class="Col1"><label>Address:</label><span class="Asterisk">*</span></td>
								  <td><div class="cleaner_with_width">&nbsp;</div></td>
								  <td><input class="Col2" name="shipping_address_txtbox" type="text" maxlength="50" /></td>
								 </tr>
								 
								<tr>
								  <td class="Col1"><label>Post Code:</label><span class="Asterisk">*</span></td>
								  <td><div class="cleaner_with_width">&nbsp;</div></td>
								  <td><input class="Col2" name="shipping_postcode_txtbox" type="text" maxlength="10" /></td>
								 </tr>';
								 
						echo	'<tr>
						           <td><span class="Asterisk">*</span> Indicates a required field</td>
								   <td><div class="cleaner_with_height">&nbsp;</div></td>
								 </tr></tbody></table>';
				 		
			  			echo '<hr/>';

						echo '<h3>Order details</h3>';
				
						echo '<table id="checkout" class="basket">
								<tr>
									<th align="left">Product ID</th>
									<th align="right">Quantity</th>
									<th align="right">Price</th>
								</tr>';

					    $_SESSION['total_price'] = 0;
					    //place lines of products in page
						foreach ($_SESSION['cart'] as $prodid => $qty)
						{
							$query_cart = "SELECT *
											FROM ecom_product
											WHERE id = '".$prodid."'";
							$result_cart = mysqli_query($connection, $query_cart);

							if(mysqli_num_rows($result_cart) > 0)
							{
								while($row_cart = mysqli_fetch_array($result_cart, MYSQLI_ASSOC))
								{
									$t_price = $row_cart['price']*$qty;
									echo "<tr>
											<td>".$row_cart['id']."</td>
											<td align='right'>".$qty."</td>
											<td align='right'>&pound;".$t_price."</td>
										</tr>";
								}
							}
						$_SESSION['total_price'] += $t_price;
						}

						if ($_SESSION['total_price'] > 100.00)
						{
							$delivery = 0.00;
						}
						else
						{
							$delivery = 3.99;
							$_SESSION['total_price'] = $_SESSION['total_price'] + $delivery;
						}

						echo '<tr>
								<td colspan="2" align="right">
									Delivery
								</td>';
						
						if ($delivery == 0.00)
						{
							echo '<td align="right">
									FREE
								</td>';
						}
						else
						{
							echo '<td align="right">
									&pound;' . $delivery . '
								</td>
								</tr>';
						}

							$totalPrice = number_format($_SESSION['total_price'], 2);
							echo "<tr>
									<td colspan='2' align='right'>
										Total
									</td>
									<td align = 'right'>
										&pound;$totalPrice
									</td>
								</tr>
						</table>";

			  echo '<hr/>';
			  
			  echo '<h3>Payment details</h3>';

			  echo	'<table border="0" class="FormTable" cellspacing="5" summary="Payment Details">
				     <tbody>';
	
			  echo	'<tr>
				    	<td colspan="3">
				    		<img src="'.$path.'assets/images/page_images/visa_logo.jpg" alt="Visa" class="basket" />
				    		<img src="'.$path.'assets/images/page_images/mastercard_logo.jpg" alt="MasterCard" class="basket"/>
				    		<img src="'.$path.'assets/images/page_images/switch_logo.jpg" alt="Switch" class="basket"/>
				    	</td>

				    </tr>';
					
			  echo	'<tr>
				       <td class="Col1"><label>Card Hodler Name:</label><span class="Asterisk">*</span><br/><span class="Note">(As shown on the card)</span></td>
				       <td><div class="cleaner_with_width">&nbsp;</div></td>
				       <td><input class="Col2" name="card_holder_name_txtbox" type="text" maxlength="50" /></td>
				    </tr>

					<tr>
				       <td class="Col1"><label>Card Number:</label><span class="Asterisk">*</span><br/><span class="Note">(Without spaces)</span></td>
				       <td><div class="cleaner_with_width">&nbsp;</div></td>
				       <td><input class="Col2" name="card_number_txtbox" type="text" maxlength="16" /></td>
				    </tr>
					
			    	<tr>
				       <td class="Col1"><label>Expiry Date:</label><span class="Asterisk">*</span><br/><span class="Note">(Format: MM/YYYY)</span></td>
				       <td><div class="cleaner_with_width">&nbsp;</div></td>
					   <td><input class="Col4" name="month_txtbox" type="text" maxlength="2" /><strong>/</strong><input class="Col4" name="year_txtbox" type="text" maxlength="4" /></td>
					 </tr>

			    	<tr>
				       <td class="Col1"><label>Security Code:</label><span class="Asterisk">*</span><br/><span class="Note">(The last 3 digits on the back)</span></td>
				       <td><div class="cleaner_with_width">&nbsp;</div></td>
					   <td><input class="Col4" name="security_code_txtbox" type="text" maxlength="3" /></td>
					 </tr>';					 

			echo   '<tr>
					<td class="Col1"><label>Card Type:</label><span class="Asterisk">*</span></td>
					  <td><div class="cleaner_with_width">&nbsp;</div></td>
					<td>
					<select name="card_type" class="Col3">
					  <option value = "Visa">Visa</option>
					  <option value = "MasterCard">MasterCard</option>
					  <option value = "Switch">Switch</option>
					</select>
					</td>
					</tr>';
			echo '<tr><td><span class="Asterisk">*</span> Indicates a required field</td><td><div class="cleaner_with_width">&nbsp;</div></td><td><input type="submit" value="Pay NOW!" /></td></tr></tbody></table></form>';	

			//Modified open source PayPal code from www.shop-script.com
			//Note: the business value attribute below should be replaced with a real business address
			echo '<form class="paypal" action="'.$path.'pages/paypal/payments.php" method="post" id="paypal_form" target="_blank">
						<div class="paypal_button">
                          or Pay with: 
                          <p> 
    
	<input type="hidden" name="cmd" value="_xclick" /> 
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="UK" />
    <input type="hidden" name="currency_code" value="GBP" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
    <input type="hidden" name="first_name" value="Paul"  />
    <input type="hidden" name="last_name" value="Smith"  />
    <input type="hidden" name="payer_email" value="abpy140-customer@ec.email.co.uk"  />
    <input type="hidden" name="item_number" value="123456" / >
    
                            <input type="image" name="submit" src="'.$path.'assets/images/page_images/paypal_logo.gif" alt="Pay with PayPal" style="width:100px; padding:0;" />
            				</p>
            				</div>
            				</form>';		
					}
				}
			}
			else
			{
				echo "Shopping cart is empty";
			}
		}
		else
		{
			echo "You must be logged in";
		}



	//login include
	include($path."assets/includes/login.php");

	//footer include
	include($path."assets/includes/footer.php");
?>