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
                <h3 class="box-title">Data Customers</h3>
                <div class="pull-right">
                    <a href="<?= site_url('customer/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table-customer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php 
                            $no = 1;
                            foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->gender == 'L' ? "Laki-Laki" : "Perempuan"; ?></td>
                            <td><?= $data->phone; ?></td>
                            <td><?= $data->address; ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('customer/edit/'.$data->customer_id)?>"
                                    class="btn btn-warning btn-xs">
                                    <i class="fa  fa-trash"></i> Upadate
                                </a>
                                <a href="<?= site_url('customer/del/'.$data->customer_id)?>"
                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa  fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?> -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>

<script>
// $(document.ready(function() {
    $("#table-customer").DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            "url" : "<?= base_url('Customer/get_json'); ?>",
            "type" : "POST",
        },
        "columns" : [
                {"data" : "no", width:40},
                {"data" : "name", width:150},
                {"data" : "gender", width:70},
                {"data" : "phone", width:120},
                {"data" : "address", width:150},
                {"data" : "action", width:100},
            ],
        "columnDefs" : [
                {"targets" : [0, 5], "orderable" : false},
                {"targets" : [2, -1], "className" : "text-center"},
            ]
    })
// }))
</script>