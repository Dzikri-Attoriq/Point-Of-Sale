<section class="content-header">
    <h1>
        Suppliers
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Suppliers</li>
    </ol>
</section>

<section class="content">

    <div class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= ucfirst($page); ?> Supplier</h3>
                <div class="pull-right">
                    <a href="<?= site_url('supplier')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= site_url('supplier/process')?>" method="post">
                            <div class="form-group">
                                <label for=" name">Supplier Name *</label>
                                <input type="hidden" name="supplier_id" value="<?= $row->supplier_id?>">
                                <input type="text" name="name" id="name" value="<?= $row->name?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=" phone">Phone *</label>
                                <input type="number" name="phone" id="phone" value="<?= $row->phone?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=" address">Address *</label>
                                <textarea type="text" name="address" id="address" class="form-control"
                                    required><?= $row->address?></textarea>
                            </div>
                            <div class="form-group">
                                <label for=" description">Description</label>
                                <textarea type="text" name="description" id="description"
                                    class="form-control"><?= $row->description?></textarea>
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