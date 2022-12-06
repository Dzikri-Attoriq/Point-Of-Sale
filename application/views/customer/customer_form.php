<section class="content-header">
    <h1>
        Customers
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customers</li>
    </ol>
</section>

<section class="content">

    <div class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= ucfirst($page); ?> Customer</h3>
                <div class="pull-right">
                    <a href="<?= site_url('customer')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= site_url('customer/process')?>" method="post">
                            <div class="form-group">
                                <label for="name">
                                    Customer Name *
                                </label>
                                <input type="hidden" name="customer_id" value="<?= $row->customer_id?>">
                                <input type="text" name="name" id="name" value="<?= $row->name?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender *</label>
                                <select type="text" name="gender" id="gender" class="form-control" required>
                                    <option value=" ">- Pilih -</option>
                                    <option value="L" <?= $row->gender == 'L' ? "selected" : null; ?>>- Laki-Laki  -
                                    </option>
                                    <option value="P" <?= $row->gender == 'P' ? "selected" : null; ?>>- Perempuan -
                                    </option>
                                </select>
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