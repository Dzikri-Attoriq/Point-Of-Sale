<section class="content-header">
    <h1>
        Unit
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Unit</li>
    </ol>
</section>

<section class="content">

    <div class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= ucfirst($page); ?> Units</h3>
                <div class="pull-right">
                    <a href="<?= site_url('unit')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= site_url('unit/process')?>" method="post">
                            <div class="form-group">
                                <label for=" name">Unit Name *</label>
                                <input type="hidden" name="unit_id" value="<?= $row->unit_id?>">
                                <input type="text" name="name" id="name" value="<?= $row->name?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?= $page; ?>" value="<?= $page; ?>" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane-o"></i> Save
                                </button>
                                <button type="reset" class="btn btn-flat">
                                    <i class="fa fa-refresh"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>