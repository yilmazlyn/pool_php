<?php
include_once 'connexion_bdd.php';
?>



<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <!--div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            Arboshiki
                            </a>
                        </h2>
                        <div>455 Foggy Heights, AZ 85004, US</div>
                        <div>(123) 456-789</div>
                        <div>company@example.com</div>
                    </div-->
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <!--iv class="text-gray-light">INVOICE TO:</div-->
                        <h2 class="to">List of Users</h2>
                        <!--div class="address">796 Silver Harbour, TX 79273, US</div>
                        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div-->
                    </div>
                    <!--div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="date">Date of Invoice: 01/10/2018</div>
                        <div class="date">Due Date: 30/10/2018</div>
                    </div-->
                </div>
                <div class="form-group col-md-12">
					<span class="oi oi-plus"><a href="users/add_user.php">
						<img src="images/open-iconic-master/svg/plus.svg" > Add User
						
						</a>
					</span>
          
        </div>
                <!--AFFICHAGE DE LA LISTE DES USERS-->
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Username</th>
                            <th class="text-right">Password</th>
                            <th class="text-right">Email</th>
                            <th class="text-right">Admin</th>
                            <th class="text-right" style="visibility:hidden">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						
						try {
							$connexion = new PDO("mysql:host=localhost;dbname=pool_php_rush;port=3306", "admin", "inka");
							$affAll = "SELECT * FROM users;" ;
							$resultat1 = $connexion->query($affAll);
							if($resultat1==false){?>
								<td colspan="5" class="text-center">No users in Database </td>
							<?php
							}
							else {
								//$ligne = $resultat1->fetch(PDO::FETCH_ASSOC);
								//var_dump($ligne);
								while ($ligne = $resultat1->fetch(PDO::FETCH_ASSOC)) {?>
									
										<tr>
											
											<td class="no"> <?php echo $ligne["id"]; ?></td>
											<td class="text-left"> <?php echo $ligne["username"]; ?></td>
											<td class="unit"> <?php echo $ligne["password"]; ?></td>
											<td class="qty"> <?php echo $ligne["email"]; ?></td>
											<td class="total"> <?php echo is_null($ligne["admin"]) ? 'NO': $ligne["admin"]; ?></td>
											
											<td class="text-center"> 
												<button type="button" class="btn btn-default btn-sm" onclick="modif_user(<?php echo $ligne["id"]; ?>);">
													<span class="glyphicon glyphicon-edit mod">Modify</span> 
												</button>
											</td>
											<td class="text-center"> 
												<button type="button" class="btn btn-default btn-sm"
												 <?php /*data-toggle="modal" data-target="#deletemodal" data-remote="<?php echo $ligne["id"]; ?>"*/ ?> 
												 onclick="showModal(<?php echo $ligne["id"]; ?>, '<?php echo $ligne["username"]; ?>');">
													
													<span class="glyphicon glyphicon-remove del">Delete</span> 
												</button>
											</td>
										</tr>
								
									<?php } ?>
									
									<!-- Modal -->
							<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Delete user</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									  <p id="confirm"> </p>
									
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
									<button id="delbtn" type="button" class="btn btn-secondary" onclick="deluser(getCookie('id'))" >Delete</button>
								  </div>
								</div>
							  </div>
							</div>
							<?php	
							}
							//var_dump($resultat1);
							$connexion = null;
						} catch (PDOException $e) {
							print "Erreur !: " . $e->getMessage() . "<br/>";
							die();
						}
						
						?>
						
						<!--
                        <tr>
                            <td class="no">04</td>
                            <td class="text-left"><h3>
                                <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                Youtube channel
                                </a>
                                </h3>
                               <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                   Useful videos
                               </a> 
                               to improve your Javascript skills. Subscribe and stay tuned :)
                            </td>
                            <td class="unit">$0.00</td>
                            <td class="qty">100</td>
                            <td class="total">$0.00</td>
                        </tr>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                            <td class="unit">$40.00</td>
                            <td class="qty">30</td>
                            <td class="total">$1,200.00</td>
                        </tr>
                        <tr>
                            <td class="no">02</td>
                            <td class="text-left"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
                            <td class="unit">$40.00</td>
                            <td class="qty">80</td>
                            <td class="total">$3,200.00</td>
                        </tr>
                        <tr>
                            <td class="no">03</td>
                            <td class="text-left"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                            <td class="unit">$40.00</td>
                            <td class="qty">20</td>
                            <td class="total">$800.00</td>
                        </tr>
                        -->
                    </tbody>
                    <tfoot>
						<!--
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$6,500.00</td>
                        </tr>
                        -->
                    </tfoot>
                </table>
                <!--
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div> -->
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
