<?php
include_once 'connexion_bdd.php';
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-20 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Category Name</th>
                        <th class="text-center">Parent ID</th>
            
                        <!--th class="text-center">Total</th-->
                        
                    </tr>
                </thead>
                <tbody>
					<?php
					try {
							
							$affAll = "SELECT * FROM categories ORDER BY parent_id ASC;" ;
							$resultat1 = $connexion->query($affAll);
							if($resultat1==false){?>
								<td colspan="3" class="text-center">No Categories in Database </td>
							<?php
							}
							else {
							
								while ($ligne = $resultat1->fetch(PDO::FETCH_ASSOC)) {?>
										<tr>
											<td class="no"> <?php echo $ligne["id"]; ?></td>
											<td class="col-sm-8 col-md-6">
													<h4 class="media-heading"><a href="#"><?php echo $ligne["name"]; ?></a></h4>
													<!--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
													<span>Status: </span><span class="text-success"><strong>In Stock</strong></span> -->
												</div>
											</div></td>
											<!--td class="col-sm-1 col-md-1" style="text-align: center">
											<input type="email" class="form-control" id="exampleInputEmail1" value="3">
											</td> -->
											<td class="col-sm-1 col-md-1 text-center"><strong><?php echo (is_null($ligne["parent_id"])) ? '-': "".$ligne['parent_id']; ?></strong></td>
											<td class="text-center"> 
												<button type="button" class="btn btn-default btn-sm" onclick="modifCatg(<?php echo $ligne["id"]; ?>);">
													<span class="glyphicon glyphicon-edit mod2">Modify</span> 
												</button>
											</td>
											<td class="col-sm-1 col-md-1">
											<button type="button" class="btn btn-danger"
											 onclick="showModalCatg(<?php echo $ligne["id"]; ?>, '<?php echo $ligne["name"]; ?>');">
												<span class="glyphicon glyphicon-remove"></span> Delete
											</button></td>
										</tr>
										
								
						<?php } ?>
									
						<!-- Modal -->
							<div class="modal fade" id="deletemodalProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>
</div>

