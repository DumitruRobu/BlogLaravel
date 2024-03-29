@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing a user</h1>
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

{{--                        //metoda interesanta de update nefolosind input type=hidden!--}}
                        <form action="{{route('admin.user.update', ['user'=>$element->id])}}" class="w-25" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <input value="{{$element->name}}" type="text" name="name" class="form-control" placeholder="Name of the user">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <input value="{{$element->email}}" type="text" name="email" class="form-control" placeholder="Email of the user">
                            </div>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror


                            <div class="form-group selectamImputernicirile">
                                <label>Select Role</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $r)
                                        <option value="{{$id}}" {{$element->role == $id ? "selected" : ""}}>{{$r}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="{{$element->id}}">
                            <input type="submit" class="btn btn-primary" value="Edit">
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
