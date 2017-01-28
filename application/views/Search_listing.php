<!-- start top pic -->
<section class="subHeader page">
    <div class="container">
    	<h1>Property Listing</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site">
        </form>
    </div>
	<!-- end subheader container -->
</section>
<!-- start horizontal filter -->
<section class="search">
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
					<div class="col-lg-2 col-md-2 col-sm-4">
						<div class="formBlock select">
							<label for="propertyType">Property Type <b class="text-danger">*</b></label><br/>
							<select name="property_type" id="propertyType" class="formDropdown">
								<?php foreach($data['property_type'] as $value): ?>
									<option <?php if($data['post']['property_type'] == $value->id){echo "selected";} ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option> <?php endforeach; ?>
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
						<div class="formBlock select">
							<label for="propertyType">Province <b class="text-danger">*</b></label><br/>
							<select name="province" id="province" class="formDropdown" onchange="search_load_city(this.value)">
								<?php foreach($data['province'] as $value): ?>
									<option <?php if($data['post']['province'] == $value->id){echo "selected";} ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
<!--city-->
					<div class="col-lg-3 col-md-3 col-sm-5">
						<div id="city" class="formBlock select">
							<label for="propertyType">City <b class="text-danger">*</b></label><br/>
							<select name="city" class="formDropdown">
								<option value=""> Select City </option>
								<?php foreach($data['city'] as $value): ?>
									<option <?php if($data['post']['city'] == $value->id){echo "selected";} ?> value="<?= $value->id ?>"><?= ucwords( $value->title ) ?></option>
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
								<option <?= ($data['post']['beds']== 0)? 'selected': '' ?> value="0">Any</option>
								<option <?= ($data['post']['beds']== 1)? 'selected': '' ?> value="1">1</option>
								<option <?= ($data['post']['beds']== 2)? 'selected': '' ?> value="2">2</option>
								<option <?= ($data['post']['beds']== 3)? 'selected': '' ?> value="3">3</option>
								<option <?= ($data['post']['beds']== 5)? 'selected': '' ?> value="5">5</option>
								<option <?= ($data['post']['beds']== 6)? 'selected': '' ?> value="6">6</option>
								<option <?= ($data['post']['beds']== 7)? 'selected': '' ?> value="7">7</option>
								<option <?= ($data['post']['beds']== 8)? 'selected': '' ?> value="8">8</option>
								<option <?= ($data['post']['beds']== 9)? 'selected': '' ?> value="9">9</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="baths">Baths</label><br/>
							<select name="baths" id="baths" class="formDropdown">
								<option <?= ($data['post']['baths']== 0)? 'selected': '' ?> value="0">Any</option>
								<option <?= ($data['post']['baths']== 1)? 'selected': '' ?> value="1">1</option>
								<option <?= ($data['post']['baths']== 2)? 'selected': '' ?> value="2">2</option>
								<option <?= ($data['post']['baths']== 3)? 'selected': '' ?> value="3">3</option>
								<option <?= ($data['post']['baths']== 4)? 'selected': '' ?> value="4">4</option>
								<option <?= ($data['post']['baths']== 5)? 'selected': '' ?> value="5">5</option>
								<option <?= ($data['post']['baths']== 6)? 'selected': '' ?> value="6">6</option>
								<option <?= ($data['post']['baths']== 7)? 'selected': '' ?> value="7">7</option>
								<option <?= ($data['post']['baths']== 8)? 'selected': '' ?> value="8">8</option>
								<option <?= ($data['post']['baths']== 9)? 'selected': '' ?> value="9">9</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="area">Area (marla)</label><br/>
							<select name="area" id="area" class="formDropdown">
								<option <?= ($data['post']['area']== 0)? 'selected': '' ?> value="0">Any</option>
								<option <?= ($data['post']['area']== 1)? 'selected': '' ?> value="1"> 1 - 5</option>
								<option <?= ($data['post']['area']== 2)? 'selected': '' ?> value="2"> 5 - 10</option>
								<option <?= ($data['post']['area']== 3)? 'selected': '' ?> value="3"> 10 - 15</option>
								<option <?= ($data['post']['area']== 4)? 'selected': '' ?> value="4"> 1 - 5 kanal</option>
								<option <?= ($data['post']['area']== 5)? 'selected': '' ?> value="5"> 5 - 10 kanal</option>
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-3">
						<div class="formBlock select">
							<label for="area">Furnished?</label><br/>
							<select name="furnish" id="area" class="formDropdown">
								<option <?= ($data['post']['furnish']== 1)? 'selected': '' ?> value="1">Yes</option>
								<option <?= ($data['post']['furnish']== 0)? 'selected': '' ?> value="0">No</option>

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


<!-- start recent properties -->
<section class="properties">
    <div class="container">
    	<ul class="propertyCat_list option-set">
    		<li><a href="<?= base_url().'search/all' ?>" class="<?php $uri_2 = $this->uri->segment(2); if( is_numeric($uri_2) || empty($uri_2) || $uri_2 == "all") {echo 'current triangle';} ?>">ALL</a></li>
    		<li><a href="<?= base_url().'search/sale' ?>" class="<?php if($this->uri->segment(2) == "sale") echo 'current triangle'; ?>">FOR SALE</a></li>
            <li><a href="<?= base_url().'search/rent' ?>" class="<?php if($this->uri->segment(2) == "rent") echo 'current triangle'; ?>">FOR RENT</a></li>
    	</ul>
    	
        <div class="divider"></div>
        <div class="row">
        <?php
		foreach ($data['search_data'] as $index=> $value):

			$img = explode(',', $value->images);
		?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a class="propertyType" href="<?= base_url('property_view/property/').$value->id ?>"><?= ucwords( $data['property_type'][0]->title ); ?></a>
                        <a href="<?= base_url('property_view/property/').$value->id?>" class="propertyImgLink"><img class="propertyImg" src="<?= base_url('assets/images/uploads/property/'.$img[0].''); ?>" alt=""></a>
                        <h4><a href="<?= base_url('property_view/property/').$value->id; ?>"><?= ucfirst( $value->title); ?></a></h4>
						<p><?= ucfirst( $value->colony ); ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale"><?= ($value->property_category == 1)? 'FOR SALE': 'FOR RENT' ?></p>
                        <p class="price"><?= number_format($value->price); ?><small> R.s</small></p>
                    </div>
                    <table border="1" class="propertyDetails">
                        <tbody><tr>
                        <td><img src="<?= base_url('assets/images/icon-area.png') ?>" alt="" style="margin-right:7px;"><?= $value->area ?> Marla</td>
                        <td><img src="<?= base_url('assets/images/icon-bed.png') ?>" alt="" style="margin-right:7px;"><?= $value->beds ?> <?= ($value->beds == 1)? 'Bed': 'Beds' ?></td>
                        <td><img src="<?= base_url('assets/images/icon-drop.png') ?>" alt="" style="margin-right:7px;"><?= $value->baths ?> <?= ($value->baths == 1)? 'Bath': 'Baths' ?></td>
                        </tr>
                    </tbody></table> 
                </div>
            </div>
        <?php endforeach;?>               
        </div>
		<!-- end row -->
        <div class="pageList">

			<?=$pages; ?>
        </div>

    </div>
	<!-- end container -->
</section>