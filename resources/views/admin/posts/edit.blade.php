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

                            <div class="form-group adaugamPreview">
                                <label for="exampleInputFile">Edit the preview image</label>
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
                            @error('preview_image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group adaugamPreview">
                                <label for="exampleInputFile">Edit the main image</label>
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
                            @error('main_image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group selectamCategoria">
                                <label>Select Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}" {{old('category_id') == $c->id ? "selected" : ""}}>{{$c->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                                    @foreach($tags as $t)
                                        <option {{is_array(old('tag_ids')) && in_array($t->id, old('tag_ids')) ? 'selected':''}} value="{{$t->id}}">{{$t->title}}</option>
                                    @endforeach
                                </select>
                            </div>

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
