<?php if($this->session->has_userdata('succes')) { ?>
<div class="alert alert-success alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i><?php echo $this->session->flashdata('succes');unset($_SESSION['success']); ?>
</div>
<?php } ?>

<?php if($this->session->has_userdata('error')) { ?>
<div class="alert alert-error alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-ban"></i> <?=  $this->session->flashdata('error');unset($_SESSION['error']); ?>
    <!-- <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))); ?> -->
</div>
<?php } ?>