<section class="content-header">
    <h1>
        Item
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
</section>

<section class="content">

    <div class="content">
        <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= ucfirst($page); ?> Item</h3>
                <div class="pull-right">
                    <a href="<?= site_url('item')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= site_url('item/process')?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=" barcode">Barocode *</label>
                                <input type="hidden" name="item_id" value="<?= $row->item_id?>">
                                <input type="text" name="barcode" id="barcode" value="<?= $row->barcode?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=" name">Product Name *</label>
                                <input type="text" name="name" id="name" value="<?= $row->name?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category *</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">>- Choose -<</option>
                                    <?php foreach($category_id->result() as $key => $data) : ?>
                                    <option value="<?= $data->category_id; ?>" <?= $data->category_id == $row->category_id ? 'selected' : null; ?>><?= $data->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit *</label>
                                    <?= form_dropdown('unit_id',$unit_id,$selectedunit,
                                    ['class' => 'form-control','required' => 'required']); ?>
                            </div>
                            <div class="form-group">
                                <label for=" price">Price *</label>
                                <input type="number" name="price" id="price" value="<?= $row->price?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=" image">Image</label>
                                <?php if($page == 'edit') {
                                    if($row->image != null) { ?>
                                        <div style="margin-bottom: 4px;">
                                            <img src="<?= base_url('assets/images/product/'.$row->image); ?>" width="30%">
                                        </div>
                                    <?php 
                                    } 
                                } ?> 
                                <input type="file" name="image" id="image" class="form-control">
                                    <small>(biarkan kosong bila tidak <?= $page == 'edit' ? 'diganti' : 'ada'; ?>)</small>
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