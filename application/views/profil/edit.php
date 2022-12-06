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
              <li class="breadcrumb-item active">Update Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8 mx-auto">
          
          <?= form_open_multipart('profil/edit')  ?>
<input type="hidden" name="user_id" value="<?= $this->fungsi->user_login()->user_id; ?>">
            <div class="form-group row">
              <div class="col-md-2">
                <label for="username">Username</label>
              </div>
              <div class="col-md-10">
                <input type="text" name="username" id="username" class="form-control" value="<?= $this->fungsi->user_login()->username ?>">
                <?= form_error('username','<small class="text-danger pl-2">','</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2">
                <label for="name">Name</label>
              </div>
              <div class="col-md-10">
                <input type="text" name="name" id="name" class="form-control" value="<?= $this->fungsi->user_login()->name ?>">
                <?= form_error('name','<small class="text-danger pl-2">','</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2">
                <label for="adderess">Adderess</label>
              </div>
              <div class="col-md-10">
                <textarea name="address" id="address" class="form-control"><?= $this->fungsi->user_login()->address ?></textarea>
                      <?= form_error('address','<small class="text-danger pl-2">','</small>'); ?>
              </div>
            </div>  

            <div class="form-group row">
              <div class="col-md-2">
                <label for="">Picture</label> 
              </div>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-3">
                    <img src="<?= base_url('assets/images/profil/').$this->fungsi->user_login()->image; ?>" class="img-thumbnail">
                  </div>
                  <div class="col-md-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="image">
                      <label for="image" class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

            <div class="form-group row justify-content-end">
              <div class="col-md-10">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
              </div>
            </div>      

          </form>    

        </div>
      </div>
    </section>