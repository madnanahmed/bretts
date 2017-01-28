<?php
$this->session->unset_userdata('is_email_already');
if(!isset($data['error'])){
    $property_view = $data['property_view'];
    $this->session->set_userdata('agent_id', $property_view->user_id);
}
?>
<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
        <h1>Property detail</h1>

    </div>
    <!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content section -->
<section class="properties">
    <div class="container">
        <div class="row">
            <?php if(isset($data['error'])){ ?>
                <div class="col-lg-9 col-md-9">
<!--                <h1 class="text-danger">--><?//= $data['error']; ?><!--</h1>-->
                    <img class="img-responsive" src="<?= base_url('assets/images/404.jpg') ?>">
                </div>
            <?php }else{ ?>
            <!-- start content -->
            <div class="col-lg-9 col-md-9">
                <div class="gallery">
                    <ul class="bxslider2">
                        <?php
                        $images  = array(
                            $property_view->image_1,
                            $property_view->image_2,
                            $property_view->image_3,
                            $property_view->image_4,
                            $property_view->image_5,
                            $property_view->image_6,
                            $property_view->image_7,
                            $property_view->image_8
                            );
                        foreach($images as $value ):
                            if(!empty($value)):
                            ?>
                        <li><img src="<?= base_url('assets/images/uploads/property/').$value;?>" alt="" /></li>
                        <?php endif; endforeach; ?>
                    </ul>

                    <div id="bx-pager">
                        <?php
                        $count = -1;
                        foreach( $images as $value ): $count++;
                            if(!empty($value)):
                        ?>
                        <a data-slide-index="<?= $count; ?>" href="#"><img src="<?= base_url('assets/images/uploads/thumbnail/').$value;?>" alt="" /></a>
                        <?php endif; endforeach; ?>
                    </div>

                    <div class="sliderControls">
                        <span class="slider-prev"></span>
                        <span class="slider-next"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="overview">
                            <h4>CONTACT INFO</h4>
                            <ul class="overviewList">
                                <li> <i class="glyphicon glyphicon-user"></i> Name <span><?= ucwords($data['user_data'][0]->name) ; ?></span></li>
                                <li> <i class="glyphicon glyphicon-phone"></i> Phone <span><?= $data['user_data'][0]->phone ; ?></span></li>
                            </ul>
                        </div>
                        <div class="overview">
                            <h4>OVERVIEW</h4>
                            <ul class="overviewList">
                                <li>Property Type <span><?= ucwords($property_view->type_title); ?></span></li>
                                <li>Contract Type <span><?= ($property_view->property_category == 1)? 'FOR SALE': 'FOR RENT'; ?></span></li>
                                <li>Location <span><?= ucwords( $property_view->colony);?></span></li>
                                <li>Size <span><?= $property_view->area ?> Marla</span></li>
                                <li>Bedrooms <span><?= $property_view->beds ?></span></li>
                                <li>Bathrooms <span><?= $property_view->baths ?></span></li>
                                <li>Furnish <span><?= ($property_view->furnish == 1)? 'YES': 'NO'; ?></span></li>
                                <li>Email <span><?= ($data['user_data'][0]->is_email_verify == 0)? 'Unverified': 'Verified'; ?></span></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <p class="price" style="float:right;"><?= number_format($property_view->price) ?><small> R.s</small></p>
                        <p class="forSale" style="float:right; margin-right:20px;"><?= ($property_view->property_category == 1)? 'FOR SALE': 'FOR RENT'; ?></p>
                        <h1><?= ucwords( $property_view->colony); ?></h1>
                        <p><?= ucfirst( $property_view->address); ?></p>
                        <p><?= $property_view->desc ?></p>
                        <br/>
                        <h4>GENERAL AMENTITIES</h4>
                        <div class="divider thin"></div>
                        <table class="amentitiesTable">
                            <tr>
                                <td><img class="icon" src="<?= ($property_view->conditioning == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Air Conditioning</td>
                                <td><img class="icon" src="<?= ($property_view->furnish == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Furnish</td>
                                <td><img class="icon" src="<?= ($property_view->pool == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Pool</td>
                                <td><img class="icon" src="<?=$property_view->garage. ($property_view->garage == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Garage</td>
                            </tr>
                            <tr>
                                <td><img class="icon" src="<?= ($property_view->balcony == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Balcony</td>
                                <td><img class="icon" src="<?= ($property_view->garden == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Garden</td>
                                <td><img class="icon" src="<?= ($property_view->sweet_water == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Sweet Water</td>
                                <td><img class="icon" src="<?= ($property_view->electricity == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Electricity</td>
                            </tr>
                            <tr>
                                <td><img class="icon" src="<?= ($property_view->sui_gas == 1)?  base_url().'assets/images/icon-check.png' :  base_url().'assets/images/icon-cross.png';?>" alt="" />Sui Gas</td>
                            </tr>

                        </table>
                        <br/>
                        <div class="divider thin"></div>
                        <?php if( $data['user_data'][0]->is_email_verify == 1): ?>
                        <h2> Contact Owner / Agent </h2>
                            <div class="con_msg"></div>
                        <form  method="post" action="#" id="contact_agent">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="user_name">Your Name</label><br>
                                        <input type="text" value="" name="user_name" id="user_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="email_id">Your Email</label><br>
                                        <input type="text" value="" name="email_id" id="email_id">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBlock">
                                        <label for="user_message">Your Message</label><br>
                                        <textarea name="user_message" id="user_message" class="formDropdown"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBlock " id="captcha">
                                        <label for="v_captcha">Verify Code</label><br>
                                        <input type="text" name="captcha_code" placeholder="Place code here" class="form-control captcha_code">
                                            <?= $data['captcha']['image'] ?><a href="javascript:void (0)" onclick="refresh_captcha()"><span> <i class="glyphicon glyphicon-refresh"></i></span></a>
                                    </div>
                                </div>
                                <div class="col-lg-3  col-md-4  col-sm-4 ">
                                    <div class="formBlock">
                                       <button type="button" onclick="contact_agent()" class="btn btn-success">SEND  <i class="glyphicon glyphicon-send"></i> </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    <?php endif; ?>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <!-- start related properties -->
            </div>
                <!-- end content -->
<?php } ?>
            <!-- start sidebar -->
            <div class="col-lg-3 col-md-3">
                <!-- start quick search widget -->
                <!-- start recent posts widget -->
                <h3>RECENT PROPERTIES</h3>
                <div class="divider"></div>
                <div class="recentPosts sidebarWidget">
                <?php foreach($data['recent_posts'] as $value ): ?>
                    <h4><a href="<?= base_url('property_view/property/').$value->id ?>"><?= ucfirst( $value->title); ?></a></h4><br>
                    <a href="<?= base_url('property_view/property/').$value->id ?>">READ MORE</a>
                    <p class="date"><?php echo date('l, jS M , Y', strtotime($value->date));  ?></p>
                    <div class="clearfix"></div>
                    <div class="underline"></div>
                <?php endforeach; ?>

                </div>
                <!-- end recent posts widget -->
                <?php if(!isset($data['error'])): ?>
                <!-- start property types widget -->
                <h3>PROPERTY TYPES</h3>
                <div class="divider"></div>
                <div class="propertyTypesWidget sidebarWidget">
                    <ul>
                     <?php foreach($data['property_type'] as $value ): ?>
                         <a href="<?= base_url('property_view/property_by_type/').$value->id.'/all'; ?>"><li><h4><?= ucfirst( $value->title ) ?></h4></li></a>
                     <?php endforeach; ?>
                    </ul>
                </div>
                <!-- end property types widget -->
                <?php endif; ?>
                <?php if( isset( $data['user_data'][0] ) ): ?>

                <div class="propertyTypesWidget sidebarWidget">
                    <img class="img-responsive" src="<?= base_url('assets/images/uploads/agents/').$data['user_data'][0]->profile_pic ?>" alt="">
                    <div class="underline"></div>
                    <p><?= ucfirst( $data['user_data'][0]->about); ?></p>
                </div>
                <?php endif;?>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <?php if(!isset($data['error'])): ?>
        <h4>RELATED PROPERTIES</h4>
        <div class="divider thin"></div>
        <div class="row">
        <?php
        foreach($data['related_posts'] as $value): ?>

            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a class="propertyType" href="<?= base_url('property_view/property/').$value->id; ?>">
                            <?= ($value->property_category == 1)? 'For Sale' : 'For Rent' ?>
                        </a>
                        <a href="<?= base_url('property_view/property/').$value->id ?>" class="propertyImgLink"><img class="propertyImg" src="<?= base_url('assets/images/uploads/thumbnail/').$value->image_1?>" alt="" /></a>
                        <h4><a href="<?= base_url('property_view/property/').$value->id ?>"><?= ucfirst( $value->title ); ?></a></h4>
                        <p><?= ucwords( $value->colony ); ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale">Price</p>
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
        <?php endforeach; endif; ?>

    </div>
        <!-- end container -->
</section>
<!-- end main content -->
