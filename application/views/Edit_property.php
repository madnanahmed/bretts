<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$property = $data['property'][0];
?>
<!-- start subheader -->
<section class="subHeader page">
	<div class="container">
		<h1>Edit Property</h1>
	</div>
	<!-- end subheader container -->
</section>
<!-- end subheader section -->
<!-- start my properties list -->
<section class="properties">
	<div class="container">
		<div class="row">
			<form method="post" action="#" id="submit_property">
			<!-- start property info -->
			<div class="col-lg-4 col-md-4">
				<h3>PROPERTY INFO</h3>
				<div class="divider"></div>
				<div class="sidebarWidget submission">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="title">Title <b class="text-danger">*</b> </label>
									<input id="title" name="title" type="text" class="form-control" value="<?= $property->title ?>">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div class="formBlock">
									<label for="price">Price (PKR) <b class="text-danger">*	</b></label>
									<input type="text" name="price" id="price" maxlength="12" value="<?=  $property->price;?>" />
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
								<label for="propertyType">Property Type <b class="text-danger">*	</b></label>
								<select name="propertyType" id="propertyType" class="formDropdown">
									<option value=""> ... Select Property type ...</option>
									<?php foreach($data['property_type'] as $value): ?>
										<option <?= ($property->property_type == $value->id)? 'selected' : '' ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
								<label for="contractType">Contract Type <b class="text-danger">* </b></label>
								<select name="contractType" id="contractType" class="formDropdown">
									<option value=""> ... Select Property Contrat ...</option>
									<option <?= ($property->property_category == 1)? 'selected' : '' ?> value="For Sale">For Sale</option>
									<option <?= ($property->property_category == 2)? 'selected' : '' ?> value="For Rent">For Rent</option>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="location">Location  <b class="text-danger">*</b> </label>
									<input id="location" name="location" placeholder="Example: Madina colony etc.." type="text" class="form-control" value="<?= $property->colony ?>">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="address">Address <b class="text-danger">*</b> </label>
									<input type="text" name="address" id="address" class="form-control" value="<?= $property->address ?>" />
							</div>
							<!--Country-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="country">
									<label for="country">Country <b class="text-danger">*</b> </label>
									<select name="country" class="formDropdown" onchange="search_load_province(this.value)">
										<option value=""> ... Select Country ...</option>
										<?php foreach($data['country'] as $value): ?>
											<option <?= ($property->country_id == $value->id)? 'selected' : '' ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<!--province-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="province_loader" style="display: block">
									<label for="province">Province <b class="text-danger">*</b> </label>									
									<select name="province" id="province" class="formDropdown" onchange="search_load_city(this.value)">
									<option value=""> ... Select Property Province ...</option>
										<?php foreach($data['province'] as $value): ?>
											<option <?= ($property->province == $value->id)? 'selected' : '' ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<!--city-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="city" style="display: block;">
									<label for="city">City <b class="text-danger">*</b> </label>
									<select name="city" class="formDropdown">
									<option value=""> ... Select Property City ...</option>
										<?php foreach($data['city'] as $value): ?>
											<option <?= ($property->city == $value->id)? 'selected' : '' ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="description">Description <b class="text-danger">*</b> </label>
									<textarea name="description" id="description" class="formDropdown"><?= $property->desc ?></textarea>
							</div>
							<div style="clear:both;"></div>
						</div>
					<!-- end row -->
				</div>
			</div>
			<!-- end property info -->

			<!-- start amenities -->
			<div class="col-lg-4 col-md-4">
				<h3>AMENITIES</h3>
				<div class="divider"></div>
				<div class="sidebarWidget submission">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="beds">Beds</label>
										<select name="beds" id="beds" class="formDropdown">
											<option <?= ($property->beds == 1)? 'selected' : '' ?> value="1">1</option>
											<option <?= ($property->beds == 2)? 'selected' : '' ?> value="2">2</option>
											<option <?= ($property->beds == 3)? 'selected' : '' ?> value="3">3</option>
											<option <?= ($property->beds == 4)? 'selected' : '' ?> value="5">5</option>
											<option <?= ($property->beds == 5)? 'selected' : '' ?> value="6">6</option>
											<option <?= ($property->beds == 6)? 'selected' : '' ?> value="7">7</option>
											<option <?= ($property->beds == 7)? 'selected' : '' ?> value="8">8</option>
											<option <?= ($property->beds == 8)? 'selected' : '' ?> value="8">9</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="baths">Baths</label>
										<select name="baths" id="baths" class="formDropdown">
											<option <?= ($property->baths == 1)? 'selected' : '' ?> value="1">1</option>
											<option <?= ($property->baths == 2)? 'selected' : '' ?> value="2">2</option>
											<option <?= ($property->baths == 3)? 'selected' : '' ?> value="3">3</option>
											<option <?= ($property->baths == 4)? 'selected' : '' ?> value="4">4</option>
											<option <?= ($property->baths == 5)? 'selected' : '' ?> value="5">5</option>
											<option <?= ($property->baths == 6)? 'selected' : '' ?> value="6">6</option>
											<option <?= ($property->baths == 7)? 'selected' : '' ?> value="7">7</option>
											<option <?= ($property->baths == 8)? 'selected' : '' ?> value="8">8</option>
											<option <?= ($property->baths == 9)? 'selected' : '' ?> value="9">9</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="area">Area (marla)</label>
										<select name="area" id="area" class="formDropdown">
											<option <?= ($property->area == 1)? 'selected' : '' ?> value="1"> 1 - 5</option>
											<option <?= ($property->area == 2)? 'selected' : '' ?> value="2"> 5 - 10</option>
											<option <?= ($property->area == 3)? 'selected' : '' ?> value="3"> 10 - 15</option>
											<option <?= ($property->area == 4)? 'selected' : '' ?> value="4"> 1 - 5 kanal</option>
											<option <?= ($property->area == 5)? 'selected' : '' ?> value="5"> 5 - 10 kanal</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="furnish">Furnished?</label>
										<select name="furnish" id="furnish" class="formDropdown">
											<option <?= ($property->furnish == 1)? 'selected' : '' ?> value="1">Yes</option>
											<option <?= ($property->furnish == 0)? 'selected' : '' ?> value="0">No</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="rooms">Rooms <b class="text-danger">*</b></label>
										<select name="rooms" id="rooms" class="formDropdown">
											<option value=""> ... Select Rooms ...</option>
											<option <?= ($property->rooms == 0)? 'selected' : '' ?> value="1">NO</option>
											<option <?= ($property->rooms == 1)? 'selected' : '' ?> value="1">1</option>
											<option <?= ($property->rooms == 2)? 'selected' : '' ?> value="2">2</option>
											<option <?= ($property->rooms == 3)? 'selected' : '' ?> value="3">3</option>
											<option <?= ($property->rooms == 4)? 'selected' : '' ?> value="4">4</option>
											<option <?= ($property->rooms == 5)? 'selected' : '' ?> value="5">5</option>
											<option <?= ($property->rooms == 6)? 'selected' : '' ?> value="6">6</option>
											<option <?= ($property->rooms == 7)? 'selected' : '' ?> value="7">7</option>
											<option <?= ($property->rooms == 8)? 'selected' : '' ?> value="8">8</option>
											<option <?= ($property->rooms == 9)? 'selected' : '' ?> value="9">9</option>
										</select>
								</div>
								<div class="amenityCheckList formBlock">
									<label>Amenities</label>
									<div class="row">

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->electricity == 1)? 'checked' : '' ?> value="1" type="checkbox" id="2" name="electricity">
											<label for="2">Electricity</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->sui_gas == 1)? 'checked' : '' ?> value="1" type="checkbox" id="3" name="sui_gas">
											<label for="3">Sui Gass</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->sweet_water == 1)? 'checked' : '' ?> value="1" type="checkbox" id="4" name="water">
											<label for="4">Sweet Water</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->pool == 1)? 'checked' : '' ?> value="1" type="checkbox" id="5" name="pool">
											<label for="5">Pool</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->garden == 1)? 'checked' : '' ?> value="1" type="checkbox" id="6" name="garden">
											<label for="6">Garden</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->balcony == 1)? 'checked' : '' ?> value="1" type="checkbox" id="7" name="balcony">
											<label for="7">Balcony</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->garage == 1)? 'checked' : '' ?> value="1" type="checkbox" id="8" name="garage">
											<label for="8">Garage</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->conditioning == 1)? 'checked' : '' ?> value="1" type="checkbox" id="9" name="air_condition">
											<label for="9">Air Condition</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input <?= ($property->boundary_wall == 1)? 'checked' : '' ?> value="1" type="checkbox" id="10" name="boundary_wall">
											<label for="10">Boundary Wall</label>
										</div>
									</div>
								</div>
							</div>
							<div style="clear:both;"></div>
						</div>
					<!-- end row -->
				</div>
			</div>
			<!-- end amenities -->

			<!-- start additional info -->
			<div class="col-lg-4 col-md-4">
				<h3>ADDITIONAL INFO</h3>
				<div class="divider"></div>
				<div class="sidebarWidget submission">
						<div class="row">
<!--name-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<label for="title">User Name </label>
								<input id="title" disabled="disabled" value="<?= $data['user_data'][0]->name?>"  class="form-control">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
								<label for="title">Phone</label>
								<input id="title" disabled="disabled"  class="form-control" value="<?= $data['user_data'][0]->phone ?>">
							</div>

							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="fileUpload">Photos <b class="text-danger">* </b></label>
									<div class="img-info"></div>
									<div id="wrapper" class="img_up">
										<div class="col-md-6" id="1">
											<input id="file_1" name="image_1" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_1)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

											<img class="file_1" height="111" width="113" src="<?php if(!empty($property->image_1)) echo base_url('assets/images/uploads/thumbnail/').$property->image_1 ?>" alt="">

										</div>
										<div class="col-md-6" id="2">
											<input id="file_2" name="image_2" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_2)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_2" height="111" width="113" src="<?php if(!empty($property->image_2)) echo base_url('assets/images/uploads/thumbnail/').$property->image_2 ?>" alt="">

										</div>

										<div class="col-md-6" id="3">
											<input id="file_3" name="image_3" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_3)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_3" height="111" width="113" src="<?php if(!empty($property->image_3)) echo base_url('assets/images/uploads/thumbnail/').$property->image_3 ?>" alt="">

										</div>
											<div class="col-md-6" id="4">
											<input id="file_4" name="image_4" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_4)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_4" height="111" width="113" src="<?php if(!empty($property->image_4)) echo base_url('assets/images/uploads/thumbnail/').$property->image_4 ?>" alt="">

										</div>
										<div class="col-md-6" id="5">
											<input id="file_5" name="image_5" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_5)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_5" height="111" width="113" src="<?php if(!empty($property->image_5)) echo base_url('assets/images/uploads/thumbnail/').$property->image_5 ?>" alt="">

										</div>
										<div class="col-md-6" id="6">
											<input id="file_6" name="image_6" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_6)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_6" height="111" width="113" src="<?php if(!empty($property->image_6)) echo base_url('assets/images/uploads/thumbnail/').$property->image_6 ?>" alt="">

										</div>
										<div class="col-md-6" id="7">
											<input id="file_7" name="image_7" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_7)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_7" height="111" width="113" src="<?php if(!empty($property->image_7)) echo base_url('assets/images/uploads/thumbnail/').$property->image_7 ?>" alt="">

										</div>
										<div class="col-md-6" id="8">
											<input id="file_8" name="image_8" type="file"/>
											<label for="file"> Choose a file <i class="glyphicon glyphicon-upload"></i> <?php if(!empty($property->image_8)) echo '<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>';?></label>

												<img class="file_8" height="111" width="113" src="<?php if(!empty($property->image_8)) echo base_url('assets/images/uploads/thumbnail/').$property->image_8 ?>" alt="">

										</div>
										<div class="clear-fix"></div>

									</div>
							</div>
							<div class="clearfix"></div>
							<input type="hidden" name="pro_id" value="<?= strrev( $property->id) ?>">
						</div>
					<!-- end row -->
				</div>
			</div>
			<!-- end additional info -->

			<div class="col-lg-4 col-lg-offset-4 col-md-4">
				<div class="formBlock">
					<input class="buttonColor" type="button" value="SUBMIT PROPERTY" onclick="edit_property()">
				</div>

			</div>
			</form>
			<!-- end form -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</section>
<!-- end my properties list -->

<!-- start call to action -->

<section class="callToAction">

	<div class="container">
		<div class="submit-err"></div>
	<div class="clearfix"></div>
	</div>
</section>