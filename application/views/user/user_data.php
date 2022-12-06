<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<section class="content">

    <div class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Users</h3>
                <div class="pull-right">
                    <a href="<?= site_url('user/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $no++; ?></td>
                            <td>
                                <?php if($data->image != null) { ?>
                                    <img class="img-circle" src="<?= base_url('assets/images/profil/'.$data->image); ?>" width="100px">
                                <?php } ?>
                            </td>
                            <td><?= $data->username; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->address; ?></td>
                            <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('user/delete')?>" method="post">
                                    <a href="<?= site_url('user/edit/'.$data->user_id.'')?>"
                                        class="btn btn-warning btn-xs">
                                        <i class="fa  fa-pencil-square-o"></i> Update
                                    </a>
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin')">
                                        <i class="fa fa-trash"></i> Delete
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>
