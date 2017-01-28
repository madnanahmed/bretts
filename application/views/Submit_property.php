<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- start subheader -->
<section class="subHeader page">
	<div class="container">
		<h1>Submit Property</h1>

	</div>
	<!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start my properties list -->
<section class="properties">
	<div class="container">
		<div class="row">
			<form method="post" action="#" id="submit_property">
			<!-- start property info -->
			<div class="col-lg-4 col-md-4">
				<h3>PROPERTY INFO</h3>
				<div class="divider"></div>
				<div class="sidebarWidget submission-prop">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="title">Title <b class="text-danger">*</b> </label><br/>
									<input id="title" name="title" type="text" class="form-control">
							</div>

							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="location">Location  <b class="text-danger">*</b> </label><br/>
									<input id="location" name="location" placeholder="Example: Madina colony etc.." type="text" class="form-control">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="address">Address <b class="text-danger">*</b> </label><br/>
									<input type="text" name="address" id="address" class="form-control" />
							</div>
							<!--Country-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="country">
									<label for="country">Country <b class="text-danger">*</b> </label>
									<select name="country" class="formDropdown" onchange="search_load_province(this.value)">
										<option value=""> ... Select Country ...</option>
										<?php foreach($data['country'] as $value): ?>
											<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<!--province-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="province_loader">
									<label for="province">Province <b class="text-danger">*</b> </label>
									<select name="province" id="province" class="formDropdown" onchange="search_load_city(this.value)">
									<option value=""> ... Select Property Province ...</option>
										<?php foreach($data['province'] as $value): ?>
											<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<!--city-->
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div id="city">
									<label for="city">City <b class="text-danger">*</b> </label>
									<select name="city" class="formDropdown">
									<option value=""> ... Select Property City ...</option>
										<?php foreach($data['city'] as $value): ?>
											<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="description">Description <b class="text-danger">*</b> </label><br/>
									<textarea name="description" id="description" class="formDropdown"></textarea>
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
				<div class="sidebarWidget submission-prop">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="beds">Beds</label><br/>
										<select name="beds" id="beds" class="formDropdown">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="8">9</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="baths">Baths</label><br/>
										<select name="baths" id="baths" class="formDropdown">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="area">Area (marla)</label><br/>
										<select name="area" id="area" class="formDropdown">
											<option value="1"> 1 - 5</option>
											<option value="2"> 5 - 10</option>
											<option value="3"> 10 - 15</option>
											<option value="4"> 1 - 5 kanal</option>
											<option value="5"> 5 - 10 kanal</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="furnish">Furnished?</label><br/>
										<select name="furnish" id="furnish" class="formDropdown">
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
										<label for="rooms">Rooms</label><br/>
										<select name="rooms" id="rooms" class="formDropdown">
											<option value=""> ... Select Rooms ...</option>
											<option value="1">NO</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
								</div>
								<div class="amenityCheckList formBlock">
									<label>Amenities</label><br/><br/>
									<div class="row">

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="2" name="electricity">
											<label for="2">Electricity</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="3" name="sui_gas">
											<label for="3">Sui Gass</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="4" name="water">
											<label for="4">Sweet Water</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="5" name="pool">
											<label for="5">Pool</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="6" name="garden">
											<label for="6">Garden</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="7" name="balcony">
											<label for="7">Balcony</label>
										</div>

										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="8" name="garage">
											<label for="8">Garage</label>
										</div>
										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="9" name="air_condition">
											<label for="9">Air Condition</label>
										</div>
										<div class="amenityCheck col-lg-6 col-md-12">
											<input value="1" type="checkbox" id="10" name="boundary_wall">
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
				<div class="sidebarWidget submission-prop">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-6">
								<div class="formBlock">
									<label for="price">Price (PKR) <b class="text-danger">*	</b></label><br/>
									<input type="text" name="price" id="price" maxlength="12" />
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="propertyType">Property Type <b class="text-danger">*	</b></label><br/>
									<select name="propertyType" id="propertyType" class="formDropdown">
									<option value=""> ... Select Property type ...</option>
										<?php foreach($data['property_type'] as $value): ?>
											<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
										<?php endforeach; ?>
									</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="contractType">Contract Type <b class="text-danger">* </b></label><br/>
									<select name="contractType" id="contractType" class="formDropdown">
										<option value=""> ... Select Property Contrat ...</option>
										<option value="For Sale">For Sale</option>
										<option value="For Rent">For Rent</option>
									</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6">
									<label for="fileUpload">Photos <b class="text-danger">* </b></label>
									<div class="img-info"></div>
									<div id="wrapper">
										<input id="fileUpload" multiple="multiple" type="file"/>
										<div id="image-holder">
										</div>
									</div>
							</div>
							<div style="clear:both;"></div>
						</div>
					<!-- end row -->
				</div>
			</div>
			<!-- end additional info -->
			<div class="col-lg-4 col-lg-offset-4 col-md-4">
				<div class="formBlock">
					<input class="buttonColor" type="button" value="SUBMIT PROPERTY" onclick="submit_property()">
				</div>
			</div>
			</form><!-- end form -->
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
	<div class="clearf">
		</div>
	</div>
</section>