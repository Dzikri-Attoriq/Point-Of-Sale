<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1>
            </h1>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb float-md-right">
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 mx-auto" >
          <form action="<?= base_url('profil/changePassword'); ?>" method="POST">
            
              <div class="form-group">
                <div class="col-md-2">
                  <label for="current_password">Current password</label>
                </div>
                <input type="password" name="current_password" id="current_password">
                <?= form_error('current_password','<small class="text-danger pl-2">','</small>'); ?>
              </div>

              <div class="form-group">
                <div class="col-md-2">
                  <label for="new_password1">New password</label>
                </div>
                <input type="password" name="new_password1" id="new_password1">
                <?= form_error('new_password1','<small class="text-danger pl-2">','</small>'); ?>
              </div>

              <div class="form-group">
                <div class="col-md-2">
                  <label for="new_password2">Repeat password</label>
                </div>
                <input type="password" name="new_password2" id="new_password2">
                <?= form_error('new_password2','<small class="text-danger pl-2">','</small>'); ?>
              </div>

              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
              </div>

          </form>
        </div>
      </div>
    </section>