<section class="content-header">
    <h1>
        Stock Out
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Stock Out</li>
    </ol>
</section>

<section class="content">

    <div class="content">
        <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Stock Out</h3>
                <div class="pull-right">
                    <a href="<?= site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Add Stock Out
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Product Item</th>
                            <th>Info</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?></td>
                            <td><?= $data->barcode; ?></td>
                            <td><?= $data->item_name; ?></td>
                            <td><?= $data->detail; ?></td>
                            <td class="text-right"><?= $data->qty; ?></td>
                            <td class="text-right"><?= indo_date($data->date); ?></td>
                            <td class="text-center" width="160px">
                                <a href="" class="btn btn-default btn-xs" id="set_dtl"
                                data-toggle="modal" data-target="#modal-detail"
                                data-barcode        ="<?= $data->barcode ?>"
                                data-itemname      ="<?= $data->item_name ?>"
                                data-detail         ="<?= $data->detail ?>"
                                data-qty            ="<?= $data->qty ?>"
                                data-date           ="<?= indo_date($data->date) ?>"
                                >
                                    <i class="fa  fa-eye"></i> Details
                                </a>
                                <a href="<?= site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>"
                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa  fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="model-content" style="background-color: white;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock Out Detail</h4>
            </div>
            <div class="modal-body table-responsive" >
                <table class="table table-bordered no-margin" id="table1">
                   <tbody>
                        <tr>
                            <th style="width: 35%">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th style="">Item Name</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th style="">Info</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th style="">Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th style="">Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                   </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var item_id = $(this).data('id'); 
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname'); //menyesuaikan dengan yang di data-('nama')
            var detail = $(this).data('detail');
            var qty = $(this).data('qty');
            var date = $(this).data('date');

            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#qty').text(qty);
            $('#date').text(date);
        })
    })
</script>