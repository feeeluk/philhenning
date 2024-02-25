
<!-- end page content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

					</div>

				</article>

				<article>

					<div class="content">
						<a href="http://facebook.com/philip.henning"><img class="links" src="<?php echo $path; ?>assets/images/page_images/facebook.png" alt="Facebook" /></a>
						<a href="http://twitter.com/philipdhenning"><img class="links" src="<?php echo $path; ?>assets/images/page_images/twitter.png" alt="Twitter" /></a>
						<a href="http://validator.w3.org/"><img class="links" src="<?php echo $path; ?>assets/images/page_images/HTML5.png" alt="Valid HTML5" /></a>
						<a href="http://validator.w3.org/"><img class="links" src="<?php echo $path; ?>assets/images/page_images/CSS.png" alt="Valid HTML5" /></a>
						
					</div>

				</article>

			</section>
				
			<section id="right">

					<aside>

						<?php
							if(!isset($_SESSION['e_commerce_username']))
								{
						?>
						<div class="aside_layout">

							<h3>Members login:</h3>


							<form name="login" id="login" method="post" action="<?php echo $path; ?>pages/login/set_session.php">


								<label>Username:</label>
								
								<input type="text" name="username" id="username" />
								
								<label>Password:</label>

								<input type="password" name="password" id="password" />

								<input type="submit" value="login" name="submit" id="submit" />

							</form>

								<?php

								if(isset($_SESSION['e_commerce_message']))
									{
										echo "<p class='message'>". $_SESSION['e_commerce_message']."</p>";
									}
								?>
						</div>	

						<?php

								}

							else
								{		
									echo "<div class='aside_layout'>
										<h3>".$_SESSION['e_commerce_username']."</h3>
										<ul>
										<li><a href='".$path."pages/login/my_profile.php'>my profile</a></li>
										<li><a href='".$path."pages/login/my_orders.php'>my orders</a></li>
										<li><a href='".$path."pages/login/edit_my_profile.php'>edit my profile</a></li>
										<li><a href='".$path."pages/login/my_comments.php'>edit my comments</a></li>
										</ul>";

									//store the sql query as a variable
									$query =  "SELECT is_admin FROM ecom_user WHERE username = '".$_SESSION['e_commerce_username']."'";

									// run the query
									$result = mysqli_query($connection, $query);                     

									//if $row is greater than 0, the username / password combination has been found, so login
								    if (mysqli_num_rows($result) > 0)
								        {
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
												{

													if($row['is_admin'] == 1)
														{
															echo "<h5>Admin section</h5>
																<ul>
																<li><a href='".$path."pages/login/admin/statistics.php'>site statistics</a></li>
																<li><a href='".$path."pages/login/admin/add_product.php'>add product</a></li>
																<li><a href='".$path."pages/login/admin/manage_products.php'>manage products</a></li>
																<li><a href='".$path."pages/login/admin/manage_comments.php'>manage comments</a></li>
																<li><a href='".$path."pages/login/admin/manage_users.php'>manage users</a></li>
																<li><a href='".$path."pages/login/admin/manage_orders.php'>manage orders</a></li>
																</ul>";
														}
												}
										}
									
									echo "<ul><li><h5><a href='".$path."pages/login/logout.php'>Logout</a></h5></li></ul>
										</div>
										</aside>

										<aside>
											<div class='aside_layout'>
												<h3>Shopping basket</h3>
												<a href='".$path."pages/basket/basket.php'>Go to basket</a>
											</div>";
									}			
								?>				
					
					</aside>

					<aside>

						<div class="aside_layout">

							<h3>Twitter</h3>
							<a class="twitter-timeline" href="https://twitter.com/PhilipDHenning/manufacturers" data-widget-id="448096139774918656">Tweets from https://twitter.com/PhilipDHenning/manufacturers</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

						</div>

					</aside>

				</section>
				
				<div class="clear"></div>
