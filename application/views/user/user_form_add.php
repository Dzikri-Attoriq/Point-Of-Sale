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
                <h3 class="box-title">Add User</h3>
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
                            <div class="form-group <?= form_error('name') ? "has-error" : null ?>">
                                <label for="name">Name *</label>
                                <input type="text" name="name" id="name" value="<?= set_value('name')?>"
                                    class="form-control">
                                <?= form_error('name')?>
                            </div>
                            <div class="form-group <?= form_error('username') ? "has-error" : null ?>">
                                <label for="username">Username *</label>
                                <input type="text" name="username" id="username" value="<?= set_value('username')?>"
                                    class="form-control">
                                <?= form_error('username')?>
                            </div>
                            <div class="form-group <?= form_error('password1') ? "has-error" : null ?>">
                                <label for="password1">Password *</label>
                                <input type="password" name="password1" id="password1" value="<?= set_value('password1')?>"
                                    class="form-control">
                                <?= form_error('password')?>
                            </div>
                            <div class="form-group <?= form_error('password2') ? "has-error" : null ?>">
                                <label for="password">Repeat Password *</label>
                                <input type="password" name="password2" id="password" value="<?= set_value('password2')?>"
                                    class="form-control">
                                <?= form_error('password2')?>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address"
                                    class="form-control"><?= set_value('address')?></textarea>
                            </div>
                            <div class="form-group <?= form_error('level') ? "has-error" : null ?>">
                                <label for="level">Level *</label>
                                <select type="text" name="level" id="level" class="form-control">
                                    <option value=" ">- Pilih -</option>
                                    <option value="1" <?= set_value('level') == 1 ? "selected" : null?>>- Admin -
                                    </option>
                                    <option value="2" <?= set_value('level') == 2 ? "selected" : null?>>- Kasir -
                                    </option>
                                </select>
                                <?= form_error('level')?>
                            </div>
                            <!-- <div class="form-group">
                                <label for=" image">Image</label> <small>*ukuran disarankan 1:1*</small>
                                <input type="file" name="image" id="image" class="form-control"
                                    value="<?= set_value('image')?>">
                                <small>(biarkan kosong bila tidak ada)</small>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" name="" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane-o"></i> Save
                                </button>
                                <a href="<?= site_url('user/user_form_add')?>" style="color:black;">
                                    <button type="reset" name="" class="btn btn-flat">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>