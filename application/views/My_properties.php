<br><br>
<br><br>


<!-- start my properties list -->
<section class="genericSection">
    <div class="container-fluid">
        <div class="col-md-2">
            <h3>Menu</h3>
            <div class="divider"></div>
            <?php include_once 'inc/Sidemenu.php';?>
        </div>

        <div class="col-md-10">
            <ul class="pageList" style=" float:right; margin-top: 4px;">
                <?= $data['pages']; ?>
            </ul>
            <h3>MY ACTIVE PROPERTIES</h3>
            <div class="divider"></div>


        <table class="myProperties">
            <tr class="myPropertiesHeader">
                <td class="myPropertyImg">Image</td>
                <td class="myPropertyAddress">Address</td>
                <td class="myPropertyType">Type</td>
                <td class="myPropertyStatus">Status</td>
                <td class="myPropertyDate">Date Created</td>
                <td class="myPropertyActions">Actions</td>

            <?php



            if(empty($data['my_property'])){
                echo '<tr class="text-red">
                        <td align="" colspan="7"><h4>Property not found! </h4></td>
                    </tr>';
            }
            foreach( $data['my_property'] as $value ):
            ?>
            <tr>
                <td class="myPropertyImg"><a href="<?= base_url().'property_view/property/'.$value->id ?>"><img class="smallThumb" src="<?= base_url('assets/images/uploads/thumbnail/').$value->image_1 ?>" alt="" /></a></td>
                <td class="myPropertyAddress"><a href="<?= base_url().'property_view/property/'.$value->id ?>"><h4><?= ucwords($value->colony); ?></h4></a></td>
                <td class="myPropertyType"><?= ucwords( $value->type_title ); ?></td>
                <td class="myPropertyStatus"><?= ($value->property_category == 1)? 'FOR SALE': 'FOR RENT' ?></td>
                <td class="myPropertyDate"><?php echo date('l, jS M , Y', strtotime($value->date)); ?></td>
                <td class="myPropertyActions">
                    <span id="<?= $value->id?>"><a href="<?= base_url('edit_property/').str_replace(' ','-',$value->title).':'.strrev($value->id); ?>"><img class="icon" src="<?= base_url('assets/images/icon-pencil.png') ?>" alt="" />EDIT</a></span>
                    <span id="<?= $value->id?>" onclick="remove_property(this.id)"><a href="javascript:void(0)"><img class="icon re_<?= $value->id ?>" src="<?= base_url('assets/images/icon-cross.png') ?>" alt="" />REMOVE</a></span>
                    <span><a href="<?= base_url().'property_view/property/'.$value->id ?>"><img class="icon" src="<?= base_url('assets/images/icon-view.png') ?>" alt="" />VIEW</a></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <ul class="pageList">
           <?= $data['pages'] ?>
        </ul>
            </div>
    </div>
    <!-- end container -->
</section>
<!-- end my properties list -->

<!-- start call to action -->
