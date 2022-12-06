<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard');?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<section class="content">

    <div class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Update User</h3>
                <div class="pull-right">
                    <a href="<?= site_url('user')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <?php echo validation_errors(); ?> -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Picture</label>
                                <div style="margin-bottom: 4px;">
                                    <img src="<?= base_url('assets/images/profil/'.$row->image); ?>" width="30%" class="img-circle">
                                </div>
                            </div>
                            <div class="form-group <?= form_error('name') ? "has-error" : null ?>">
                                <label for="name">Name *</label>
                                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                                <input type="text" name="name" id="name"
                                    value="<?= $this->input->post('name') ?? $row->name ?>" class="form-control" readonly>
                                <?= form_error('name')?>
                            </div>
                            <div class="form-group <?= form_error('username') ? "has-error" : null ?>">
                                <label for="username">Username *</label>
                                <input type="text" name="username" id="username"
                                    value="<?= $this->input->post('username') ?? $row->username ?>"
                                    class="form-control" readonly>
                                <?= form_error('username')?>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address"
                                    class="form-control" readonly><?= $this->input->post('address') ?? $row->address ?></textarea>
                            </div>
                            <div class="form-group <?= form_error('level') ? "has-error" : null ?>">
                                <label for="level">Level *</label>
                                <select type="text" name="level" id="level" class="form-control">
                                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                    <option value="1">- Admin -</option>
                                    <option value="2" <?= $level == 2 ? "selected" : null; ?>>- Kasir -</option>
                                </select>
                                <?= form_error('level')?>
                            </div>
                            <!-- <div class="form-group">
                                <label for=" image">Image</label> <small>*ukuran disarankan 1:1*</small>
                                <div style="margin-bottom: 4px;">
                                    <img src="<?= base_url('assets/images/profil/'.$row->image); ?>" width="30%">
                                </div>
                                <input type="file" name="image" id="image" class="form-control">
                                <small>(biarkan kosong bila tidak diganti</small>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" name="" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane-o"></i> Save
                                </button>
                                <button type="reset" name="<?= site_url('user/user_form_add')?>" class="btn btn-flat">
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