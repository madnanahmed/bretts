<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
        <h1>Property Listing</h1>
<!--        <form class="searchForm" method="post" action="#">-->
<!--            <input type="text" name="search" value="Search our site" />-->
<!--        </form>-->
    </div>
    <!-- end subheader container -->
</section>
<!-- end subheader section -->
<!-- start recent properties -->
<section class="properties">
    <div class="container">
        <ul class="propertyCat_list option-set">
            <li><a <?= ($this->uri->segment(4) == 'all')? 'class="current triangle"':'' ?> href="<?= base_url().'property_view/property_by_type/'.$this->uri->segment(3).'/all' ?>">ALL </a></li>
            <li><a <?= ($this->uri->segment(4) == '1')? 'class="current triangle"':'' ?> href="<?= base_url().'property_view/property_by_type/'.$this->uri->segment(3).'/1' ?>">FOR SALE</a></li>
            <li><a <?= ($this->uri->segment(4) == '2')? 'class="current triangle"':'' ?> href="<?= base_url().'property_view/property_by_type/'.$this->uri->segment(3).'/2' ?>">FOR RENT</a></li>
        </ul>
        <ul class="propertySort_list">
            <li style="padding-right:0px;">
                <form style="margin-top:-10px;">
                    <div class="formBlock select">
                        <select name="property type"  data-type="<?= $this->uri->segment(4); ?>" id="mycat" class="formDropdown">
                            <option value="all">Any</option>
                            <?php foreach($data['property_type'] as $value ): ?>
                                <option <?php echo ($this->uri->segment(3) == $value->id )? 'selected' : ''; ?> value="<?= $value->id ?>"><?= ucfirst($value->title) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </li>
            <li><p>Property Type:</p></li>
            <li><div style="width:1px; height:45px; margin-top:-12px; background-color:#c5c5c5;"></div></li>
        </ul>
        <div class="divider"></div>
        <div class="row">
            <?php
            if(!isset($data['error'])):
                foreach($data['property_list'] as $value): ?>
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
                                <a href="<?= base_url('property_view/property/').$value->id ?>" class="propertyImgLink"><img class="propertyImg" src="<?= base_url('assets/images/uploads/property/').$value->image_1 ?>" alt="" /></a>
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
        <div class="pageList">
            <?=$pages; ?>
        </div>
        <?php else: ?>
                <div class="col-lg-9 col-md-9">
                    <h1 class="text-danger"><?= $data['error']; ?></h1>
                </div>
            <?php endif; ?>
    </div>
    <!-- end container -->
</section>
<!-- end recent properties -->
