<div class="row pad-bot-30 align-items-center">
    <div class="col-lg-4 col-sm-4 col-12">
        <div class="item-view-mode res-box">
            <ul class="nav item-filter-list" role="tablist">
                <li><a data-toggle="tab" href="#grid-view"><i class="ion-grid"></i></a></li>
                <li><a class="active" data-toggle="tab" href="#list-view"><i class="ion-ios-list"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-8 col-sm-8 col-12">
        <div class="item-element res-box  text-right xs-left">
            <p>Menampilkan <span><?php echo $total_umkm_filter; ?> dari <?php echo $total_umkm; ?></span> UMKM</p>
        </div>
    </div>
</div>
<div class="item-wrapper">
    <div class="tab-content">
        <div id="grid-view" class="tab-pane active product-grid">
            <div class="row">
                <?php foreach($list_produk as $data):?>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="trending-place-item">
                        <div class="trending-img">
                         <?php if($data->featured_images !== null): ?>
                            <img src="<?php echo base_url().'uploads/images/profil/'. $data->featured_images;?>" alt="#">
                            <?php else: ?>
                            <img src="<?php echo base_url().'uploads/images/profil/no-images.jpg';?>" alt="#">
                            <?php endif; ?>
                            <span class="save-btn"><i class="icofont-heart"></i></span>
                        </div>
                        <div class="trending-title-box">
                            <h4><a href="<?php echo base_url('umkm/').$data->slug; ?>"><?php echo $data->NAMA_USAHA; ?></a></h4>
                            <ul class="trending-address">
                                <li><i class="ion-ios-location"></i>
                                    <p><?php echo $data->ALAMAT?></p>
                                </li>
                                <li><i class="ion-ios-telephone"></i>
                                    <p>WA : <?php echo $data->TELP?></p>
                                </li>
                            </ul>
                            <div class="trending-bottom mar-top-15 pad-bot-30">
                                <!-- <div class="trend-left float-left">
                                    <span class="round-bg pink"><i class="icofont-hotel"></i></span>
                                    <p><a href="#">Rp. <?php echo $data->harga_produk;?></a></p>
                                </div> -->
                                <div class="trend-right float-right">
                                    <!-- <div class="trend-open"><i class="ion-clock"></i>
                                        Open <p>till 11.00pm</p>
                                    </div> -->
                                    <a href="<?php echo base_url('umkm/').$data->slug; ?>"><button class="btn v8 add-margin">Lihat Detail</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div id="list-view" class="tab-pane product-list">
            <?php foreach($list_produk as $data):?>
            <div class="row trending-place-item">
                <div class="col-md-6 no-pad-lr">
                    <div class="trending-img">
                         <?php if($data->featured_images !== null): ?>
                            <img src="<?php echo base_url().'uploads/images/profil/'. $data->featured_images;?>" alt="#">
                            <?php else: ?>
                            <img src="<?php echo base_url().'uploads/images/profil/no-images.jpg';?>" alt="#">
                            <?php endif; ?>
                        <span class="trending-rating-green">7</span>
                        <span class="save-btn"><i class="icofont-heart"></i></span>
                    </div>
                </div>
                <div class="col-md-6 no-pad-lr">
                    <div class="trending-title-box">
                        <h4><a href="<?php echo base_url('umkm/').$data->slug?>"><?php echo $data->NAMA_USAHA; ?></a></h4>
                        <ul class="trending-address">
                            <li><i class="ion-ios-location"></i>
                                <p><?php echo $data->ALAMAT; ?></p>
                            </li>
                            <li><i class="ion-ios-telephone"></i>
                                <p>WA : <?php echo $data->TELP; ?></p>
                            </li>
                        </ul>
                        <div class="trending-bottom mar-top-15 pad-bot-30">
                            <!-- <div class="trend-left float-left">
                                <span class="round-bg pink"><i class="icofont-hotel"></i></span>
                                <p><a href="#">Rp. <?php echo $data->harga_produk; ?></a></p>
                            </div> -->
                            <div class="trend-right float-right">
                                <a href="<?=base_url('umkm/').$data->slug?>"><button class="btn v8 add-margin">Lihat Detail</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <!--pagination starts-->
        <div class="post-nav nav-res pad-top-10">
            <div class="row">
                <div class="col-md-8 offset-md-2  col-xs-12 ">
                    <div class="page-num text-center">
                        <div id="show_paginator" align="center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $total_page = ( $total_umkm / $limit); if ($total_page < 1){ $total_page = '1' ; } ?>
<script type="text/javascript">
    $('#show_paginator').bootpag({
        page : <?php echo $page?>,
        total: <?php echo $total_page ?>,
        maxVisible: 10
        }).on("page", function(event, num){
            var n = num;
            $(".page").html("Page " + num);
            get_items(n);
    });
</script>