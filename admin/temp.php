
// ROle selection
<div class="row">
							<div class="col-md-12">
								<div>
									<select name="cmbrole" class="form-control">
										<option value="0">--select Role--</option>
										<?php
											$sql="select * from tbl_role";
											$res=mysqli_query($con,$sql);
											while($row=mysqli_fetch_assoc($res))
											{
											?>
											<option value="<?php echo $row['role_id'] ?>"><?php echo $row['rolename'];	  ?></option>
											<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						