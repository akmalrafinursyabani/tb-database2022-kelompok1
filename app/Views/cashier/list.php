<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h1 class="m-0">Daftar Kasir</h1>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('cashier/create') ?>" class="btn btn-primary">+ Kasir Baru</a>
                </div><!-- /.col -->
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
                            <h3 class="card-title">Daftar Kasir</h3>

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
                        <div class="card-body table-responsive p-0"><?php if (!empty($items) && is_array($items)) : ?>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kasir</th>
                                            <th>No. HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                        $no = 1;
                                                                        foreach ($items as $item) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($item['name']) ?></td>
                                                <td><?= esc($item['phone_number']) ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('/cashier/' . esc($item['id']) . '/update') ?>" class="btn btn-warning">
                                                        Edit
                                                    </a> |
                                                    <a href="<?php echo base_url('/cashier/' . esc($item['id']) . '/delete') ?>" class="btn btn-danger">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="ml-3">Belum ada kasir yang tersedia.</p>
                            <?php endif ?>
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