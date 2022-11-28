<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1 class="m-0">Tambah Barang</h1>
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
                            <h3 class="card-title">Daftar Barang</h3>

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

                            <form action="<?php echo base_url('/items/create') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="card-body table-responsive p-0">
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Kode Barang</label>
                                        <input type="text" name="code" required class="form-control" id="exampleInputEmail1" placeholder="Contoh: EXC0391230">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <input type="text" name="name" required class="form-control" id="exampleInputEmail1" placeholder="Coklat Kacang Medusa">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Stok</label>
                                        <input type="number" name="stock" required class="form-control" id="exampleInputEmail1" placeholder="Jumlah stok barang">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Harga</label>
                                        <input type="number" name="price" required class="form-control" id="exampleInputEmail1" placeholder="25000">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Kategory</label>
                                        <input type="text" name="category" required class="form-control" id="exampleInputEmail1" placeholder="Contoh: EXC0391230">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Tambah barang</a>
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