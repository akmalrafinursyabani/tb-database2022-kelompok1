<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Edit Data Kasir</h1>
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
                            <h3 class="card-title">Edit Data Kasir</h3>

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

                            <form action="<?php echo base_url('/cashier/' . $item['id'] . '/update') ?>" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id" value="<?= esc($item['id'])  ?>" id="">
                                <div class="card-body table-responsive p-0">
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Nama Kasir</label>
                                        <input type="text" name="name" value="<?= esc($item['name']) ?>" required class="form-control" id="exampleInputEmail1" placeholder="Hendrianti">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">No. Handphone</label>
                                        <input type="number" name="phone_number" value="<?= esc($item['phone_number'])  ?>" required class="form-control" id="exampleInputEmail1" placeholder="08xxxxxxx">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update Data Kasir</a>
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