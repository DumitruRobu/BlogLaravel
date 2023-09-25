<style>
    .adaugamPreview{
        width: 25%;
    }
</style>

@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding a post</h1>
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

                        <form action="{{route('admin.post.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <input value="{{old("title")}}" type="text" name="title" class="form-control" placeholder="Name of the post">
                            </div>
                            @error('title')
                                <p class="text-danger">{{"Completeaza cimpul cu ceva text!"}}</p>
                            @enderror

                            <div class="form-group">
                                    <textarea id="summernote" name="content">{{old("content")}}</textarea>
                            </div>
                            @error('content')
                            <p class="text-danger">{{"Completeaza cimpul cu ceva text!"}}</p>
                            @enderror

                            <div class="form-group adaugamPreview">
                                <label for="exampleInputFile">Add a preview</label>
                                <div class="input-group ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group adaugamPreview">
                                <label for="exampleInputFile">Add the main image</label>
                                <div class="input-group ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Add post">

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
