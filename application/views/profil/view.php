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
<!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Profil Data</h1>

          <!-- Card -->
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/images/profil/').$this->fungsi->user_login()->image; ?>" alt="..." width="150" height="150" class="rounded-circle">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $this->fungsi->user_login()->name; ?></h5>
                  <p class="card-text"><?= $this->fungsi->user_login()->username; ?></p>
                  <p class="card-text"><small class="text-muted"> <?= $this->fungsi->user_login()->address; ?></small></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Card -->

      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
    </section>