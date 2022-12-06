<section class="content-header">
    <h1>
        Sales Report
        <small>Laporan Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li>Reports</li>
        <li class="active">Sales</li>
    </ol>
</section>

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter Data</h3>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="date1">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date1" id="date1" class="form-control" value="<?= @$post['date1']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="date2">s/d</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date2" id="date2" class="form-control" value="<?= @$post['date2']; ?>">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="customer">Customer</label>
                                <div class="col-sm-9">
                                    <select name="customer" id="customer" class="form-control text-center">
                                        <option value="">- All -</option>
                                        <option value="null" <?= @$post['customer'] == 'null' ? 'selected' : ''; ?>>Umum</option>
                                        <?php foreach($customer as $cst => $data) : ?>
                                        <option value="<?= $data->customer_id; ?>" <?= @$post['customer'] == $data->customer_id ? 'selected' : ''; ?> > <?= $data->name; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="invoice">Invoice</label>
                                <div class="col-sm-9">
                                    <input type="text" name="invoice" id="invoice" class="form-control" value="<?= @$post['invoice']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" name="reset" class="btn btn-flat">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="submit" name="filter" class="btn btn-info btn-flat">
                                <i class="fa fa-search"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Penjualan</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Grand Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
                        foreach($row->result() as $key => $data) :  ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?></td>
                            <td><?= $data->invoice; ?></td>
                            <td><?= indo_date($data->date); ?></td>
                            <td><?= $data->customer_name == null ? "Umum" : $data->customer_name ?></td>
                            <td class="text-right"><?= indo_currency($data->total_price); ?></td>
                            <td class="text-right"><?= indo_currency($data->discount); ?></td>
                            <td class="text-right"><?= indo_currency($data->final_price); ?></td>
                            <td class="text-center" width="200px">
                                <button id="detail" data-target="#modal-detail" data-toggle="modal"
                                data-invoice="<?= $data->invoice; ?>"
                                data-date="<?= indo_date($data->date); ?>"
                                data-time="<?= substr($data->sale_created, 11, 5); ?>"
                                data-customer="<?= $data->customer_id == null ? "Umum" : $data->customer_name; ?>"
                                data-total="<?= indo_currency($data->total_price); ?>"
                                data-discount="<?= indo_currency($data->discount); ?>"
                                data-grandtotal="<?= indo_currency($data->final_price); ?>"
                                data-cash="<?= indo_currency($data->cash); ?>"
                                data-remaining="<?= indo_currency($data->remaining); ?>"
                                data-note="<?= $data->note; ?>"
                                data-cashier="<?= ucfirst($data->name_user); ?>"
                                data-saleid="<?= $data->sale_id; ?>"
                                class="btn btn-default btn-xs">
                                    <i class="fa fa-eye"></i> Detail
                                </button>
                                <a href="<?= site_url('sale/cetak/'.$data->sale_id)?>"
                                    class="btn btn-warning btn-xs" target="_blank">
                                    <i class="fa  fa-print"></i> Print
                                </a>
                                <a href="<?= site_url('sale/del/'.$data->sale_id)?>"
                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa  fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($bottom > 10): ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><?= $pagination; ?></li>
                    </ul>
                </div>
            <?php endif ?>
        </div>
    </div>

</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-center">
        <div class="model-content" style="background-color: white;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Sales Report Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 20%">Invoice</th>
                            <td style="width: 30%"><span id="invoice"></span></td>
                            <th style="width: 20%">Customer</th>
                            <td style="width: 30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Date Time</th>
                            <td><span id="datetime"></span></td>
                            <th>Cashier</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total"></span></td>
                            <th>Cash</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="discount"></span></td>
                            <th>Change</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>Note</th>
                            <td><span id="note"></span></td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

$(document).on('click', '#detail', function() {
    $('#invoice').text($(this).data('invoice'))
    $('#cust').text($(this).data('customer'))
    $('#datetime').text($(this).data('date') +' '+ $(this).data('time'))
    $('#total').text($(this).data('total'))
    $('#discount').text($(this).data('discount'))
    $('#change').text($(this).data('remaining'))
    $('#grandtotal').text($(this).data('grandtotal'))
    $('#note').text($(this).data('note'))
    $('#cash').text($(this).data('cash'))
    $('#cashier').text($(this).data('cashier'))

    var product = '<table class="table no-margin">'
    product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
    $.getJSON('<?= base_url('report/sale_product/'); ?>'+$(this).data('saleid'), function(data) {
        $.each(data, function(key, val) {
            product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
        }) 
        product += '</table>'
        $('#product').html(product)
    })
})

</script>