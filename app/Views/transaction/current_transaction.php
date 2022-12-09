<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Transaksi untuk:</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Data transaksi</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="alert alert-danger print-error-msg" style="display:none">
                            </div>
                            
                            <form action="<?php echo base_url('/transaction/create') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="card-body table-responsive p-0">
                                    <div class="form-group mb-2">
                                        <label for="exampleSelectBorder">Pilih pengguna</label>
                                        <select class="custom-select form-control-border" name="customer" id="exampleSelectBorder">
                                            <option selected disabled>Pilih pelanggan</option>
                                            <?php if (!empty($customers) && is_array($customers)) : ?>
                                                <?php
                                                $no = 1;
                                                foreach ($customers as $customer) : ?>

                                                    <option value="<?= esc($customer['id']) ?>"><?= esc($no) ?>. <?= esc($customer['name']) ?></option>
                                                    <?php $no++ ?>
                                                <?php endforeach ?>

                                            <?php else : ?>
                                                <option disabled>Belum ada data pengguna.</option>
                                            <?php endif ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="exampleSelectBorder">Pilih kasir</label>
                                        <select class="custom-select form-control-border" name="cashier" id="exampleSelectBorder">
                                            <option selected disabled>Pilih kasir</option>
                                            <?php if (!empty($cashiers) && is_array($cashiers)) : ?>
                                                <?php
                                                $no = 1;
                                                foreach ($cashiers as $cashier) : ?>

                                                    <option value="<?= esc($cashier['id']) ?>"><?= esc($no) ?>. <?= esc($cashier['name']) ?></option>
                                                    <?php $no++ ?>
                                                <?php endforeach ?>

                                            <?php else : ?>
                                                <option disabled>Belum ada data kasir.</option>
                                            <?php endif ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Tambah Data transaksi</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>