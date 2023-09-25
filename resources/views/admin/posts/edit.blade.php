@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing a post</h1>
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
                        <form action="{{route('admin.post.update', ['post'=>$element->id])}}"  method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="form-group w-25">
                                <input value="{{$element->title}}" type="text" name="title" class="form-control" placeholder="Name of the post">
                            </div>
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group ">
                                <textarea id="summernote" name="content">{{old("content") ? old("content") : $element->content}}</textarea>
                            </div>
                            @error('content')
                            <p class="text-danger">{{"Completeaza cimpul cu ceva text!"}}</p>
                            @enderror

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
