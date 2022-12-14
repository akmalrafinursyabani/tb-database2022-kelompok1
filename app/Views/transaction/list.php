<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h1 class="m-0">Riwayat Transaksi</h1>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('/transaction/create') ?>" class="btn btn-primary">+ Transaksi Baru</a>
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
                            <h3 class="card-title">Riwayat Transaksi</h3>

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
                        <div class="card-body table-responsive p-0">
                            <?php if (!empty($items) && is_array($items)) : ?>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Faktur</th>
                                            <th>Total Pemasukan</th>
                                            <th>Tanggal Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($items as $item) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($item['invoice']) ?></td>
                                                <td><?php
                                                        if ($item['price'] == null) {
                                                            echo "Belum ada jumlah.";
                                                        } else {
                                                            echo "Rp" . $item['price'];
                                                        }
                                                        ?></td>
                                                <td><?= esc($item['created_at']) ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">
                                                        Detail Transaksi
                                                    </a> |
                                                    <a href="<?php echo base_url('transaction/' . esc($item['id']) . '/update') ?>" class="btn btn-warning">
                                                        Edit
                                                    </a> |
                                                    <a href="<?php echo base_url('transaction/' . esc($item['id']) . '/delete') ?>" class="btn btn-danger">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="ml-3 mt-2">Belum ada data transaksi yang tersedia.</p>
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