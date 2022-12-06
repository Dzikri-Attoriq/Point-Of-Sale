<section class="content-header">
    <h1>
        Item
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard')?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Item</li>
    </ol>
</section>

<section class="content">

    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Barcode Generator</h3>
                <div class="pull-right">
                    <a href="<?= site_url('item')?>" class="btn btn-warning btn-flat" target="_blank">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <?php  
                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128);
                ?>
                <?= $row->barcode; ?>
                <br><br>
                <a href="<?= site_url('item/barcode_print/'.$row->item_id)?>" class="btn btn-default btn-xs">
                    <i class="fa fa-trash"></i> Print
                </a>
            </div>
        </div>

        <!-- <div class="content">
            <div class="box-">
                <div class="box-header">
                    <h3 class="box-title">QR-Code Generator</h3>
                </div>
                <div class="box-body">
                php  
                    //$qrCode = new Endroid\QrCode\QrCode('123445');
                    //$qrCode->writeFile('uploads/qr-code/item-'.$row->item_id.'.png')
                ?>
                    ?= //$row->barcode; ?>
                </div>
            </div>

        </div> -->

</section>