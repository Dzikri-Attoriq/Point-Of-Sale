<section class="content-header">
    <h1>
        Dashboard
        <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">

    <!-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Items</span>
                    <span class="info-box-number"><?= $this->fungsi->count_item() ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Supplier</span>
                    <span class="info-box-number"><?= $this->fungsi->count_supplier() ?></span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Customer</span>
                    <span class="info-box-number"><?= $this->fungsi->count_customer() ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number"><?= $this->fungsi->count_user() ?></span>
                </div>
            </div>
        </div>
    </div> -->


    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $this->fungsi->count_item() ?></h3>

                    <p>Items</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="<?= site_url('item') ?>" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $this->fungsi->count_supplier() ?></h3>

                    <p>Supplier</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck"></i>
                </div>
                <a href="<?= site_url('supplier') ?>" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $this->fungsi->count_customer() ?></h3>

                    <p>Customer</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?= site_url('customer') ?>" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $this->fungsi->count_user() ?></h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>

    <div class="box box-solid">
        <div class="box-header">
            <i class="fa fa-th"></i>
            <h3 class="box-title">Produk Terlaris bulan ini</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="graph" id="sales-bar"></div>
        </div>
    </div>

</section>

<!-- Morris charts -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/morris.js/morris.css">

<!-- Morris.js charts -->
<script src="<?= base_url('assets/'); ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/morris.js/morris.min.js"></script>

<script>
     //BAR CHART
    Morris.Bar({
      element: 'sales-bar',
      resize: true,
      data: [
        <?php foreach ($row as $key => $data) {
            echo "{item: '".$data->name."', sold: ".$data->sold."},";
        } ?>
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'item',
      ykeys: ['sold'],
      labels: ['Sold'],
      hideHover: 'auto'
    });
</script>