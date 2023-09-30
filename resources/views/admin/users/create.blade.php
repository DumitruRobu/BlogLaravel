@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding a user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-12">

                        <form action="{{route('admin.user.store')}}" class="w-25" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name of the user">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email of the user">
                            </div>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <input type="text" name="password" class="form-control" placeholder="Password of the user">
                            </div>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <input type="submit" class="btn btn-primary" value="Add">

                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
