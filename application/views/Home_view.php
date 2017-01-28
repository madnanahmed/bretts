<!-- start subheader -->
<section class="sliderControls">
	<div>
		<span class="slider-prev"></span>
		<span class="slider-next"></span>
	</div>
</section>

<section class="subHeader home bxslider">
	<?php
	foreach($data['slider'] as $value): ?>
	<div class="slider_home" style="background-image: url('<?= base_url('assets/images/uploads/slider/'.$value->image) ?>'); background-repeat:no-repeat; background-size:cover">
		<div class="container">
			<div class="col-lg-6">
				<?php if(!empty($value->desc)): ?>
					<div class="sliderTextBox">
						<p><?= ucfirst( $value->desc ); ?></p>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-3 col-lg-offset-3">
				<?php if(!empty($value->title)): ?>
					<h1 class="sliderPrice"><?= ucwords( $value->title ); ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</section>

<!-- start horizontal filter -->
<section class="filter">
	<div class="container">
		<div class="filterHeader">
			<ul class="filterNav tabs">
				<li><a class="current triangle" href="#tab1">ALL PROPERTIES</a></li>
			</ul>
			<div class="filterHeadButton"><a class="buttonGrey" href="<?= base_url('property_view/property_by_type/all/all'); ?>">VIEW ALL LISTINGS</a></div>
		</div>
		<div class="filterContent" id="tab1" style="display: block">
			<form method="post" action="<?= base_url('search') ?>">
				<div class="row">
<!--propert type-->
					<div class="col-lg-3 col-md-3 col-sm-5">
						<div class="formBlock select">
							<label for="propertyType">Property Type <b class="text-danger">*</b></label><br/>
							<select name="property_type" id="propertyType" class="formDropdown">
								<?php foreach($data['property_type'] as $value): ?>
									<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
<!-- Country -->
					<div class="col-lg-2 col-md-2 col-sm-4">
						<div id="country">
							<label for="country">Country <b class="text-danger">*</b> </label>
							<select name="country" class="formDropdown" onchange="search_load_province(this.value)">
								<option value="">Select Country</option>
								<?php foreach($data['country'] as $value): ?>
									<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
<!--province-->
					<div class="col-lg-2 col-md-2 col-sm-4">
						<div id="province_loader" class="formBlock select">
							<label for="propertyType">Province <b class="text-danger">*</b></label><br/>
							<select name="province" id="province" class="formDropdown" onchange="search_load_city(this.value)">
								<?php foreach($data['province'] as $value): ?>
									<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
<!--city-->
					<div class="col-lg-2 col-md-2 col-sm-4">
						<div id="city" class="formBlock select">
							<label for="propertyType">City <b class="text-danger">*</b></label><br/>
							<select name="city" class="formDropdown">
								<?php foreach($data['city'] as $value): ?>
									<option value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4">
						<div class="formBlock">
							<label for="price-min">Price Range</label><br/>
							<div style="float:right; margin-top:-25px;">
								<div class="priceInput"><input type="text" name="price_min" id="price-min" class="priceInput" /></div>
								<span style="float:left; margin-right:10px; margin-left:10px;">-</span>
								<div class="priceInput"><input type="text" name="price_max" id="price-max" class="priceInput" /></div>
							</div><br/>
							<div class="priceSlider"></div>
							<div class="priceSliderLabel"><span>0</span><span style="float:right;">800,000</span></div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="beds">Beds</label><br/>
							<select name="beds" id="beds" class="formDropdown">
								<option value="0">Any</option>
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
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="baths">Baths</label><br/>
							<select name="baths" id="baths" class="formDropdown">
								<option value="0">Any</option>
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
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="area">Area (marla)</label><br/>
							<select name="area" id="area" class="formDropdown">
								<option value="0">Any</option>
								<option value="1"> 1 - 5</option>
								<option value="2"> 5 - 10</option>
								<option value="3"> 10 - 15</option>
								<option value="4"> 1 - 5 kanal</option>
								<option value="5"> 5 - 10 kanal</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="area">Furnished?</label><br/>
							<select name="furnish" id="furnish" class="formDropdown">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>

						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="formBlock">
							<input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
			</form>
		</div>
		<!-- END TAB1 -->

	</div>
	<!-- END CONTAINER -->
</section>
<!-- end horizontal filter -->
<!-- start big message -->
<?php
if( isset($_SESSION['error_msg']) ){?>
	<div style="margin:0 auto; width: 30% ">
			<?php
			foreach($_SESSION['error_msg'] as $value){
				echo '<div class="alert alert-danger">
					 	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Error!</strong> '.$value.'
					 </div>';
			}?>

	</div>
	<?php } ?>

			<!--</div>-->

<!-- end big message -->

<!-- start recent properties -->
<section class="properties">
	<div class="container">
		<h3>RECENT PROPERTIES</h3>
		<div class="divider"></div>
		<div class="row">
	<?php foreach($data['new_property'] as $value):  ?>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="propertyItem">
					<div class="propertyContent">
						<a class="propertyType" href="<?= base_url('property_view/property/').$value->id; ?>">
							<?php
						foreach($data['property_type'] as  $p_type):
							if($p_type->id == $value->property_type){
							echo strtoupper( $p_type->title );
							}
							endforeach;
							?>
						</a>
						<a href="<?= base_url('property_view/property/').$value->id ?>" class="propertyImgLink">
							<img class="propertyImg" src="<?= base_url('assets/images/uploads/property/'.$value->image_1)?>" alt="" /></a>
						<h4><a href="<?= base_url('property_view/property/').$value->id ?>"><?php if(strlen($value->title) > 30){ echo  ucwords( substr( $value->title, 0, 30 ).'...') ;}else{ echo ucwords( $value->title); }?></a></h4>
						<p><?php if(strlen($value->colony) > 30){ echo  ucwords( substr( $value->colony, 0, 30 ).'...') ;}else{ echo ucwords( $value->colony); }?></p>
						<div class="divider thin"></div>
						<p class="forSale"><?= ($value->property_category == 1)? 'FOR SALE' : 'FOR RENT' ?></p>
						<p class="price"><?= number_format( $value->price); ?><small> R.s</small></p>
					</div>
					<table border="1" class="propertyDetails">
						<tr>
							<td><img src="<?= base_url('assets/images/icon-area.png')?>" alt="" style="margin-right:7px;" /><?= $value->area ?></td>
							<td><img src="<?= base_url('assets/images/icon-bed.png')?>" alt="" style="margin-right:7px;" /><?= $value->beds ?> Beds</td>
							<td><img src="<?= base_url('assets/images/icon-drop.png')?>" alt="" style="margin-right:7px;" /><?= $value->baths ?> Baths</td>
						</tr>
					</table>
				</div>
			</div>
	<?php endforeach; ?>
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</section>

