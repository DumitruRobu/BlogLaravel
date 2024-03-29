<style>
    .content-cell {
        max-width: 400px; /* Adjust the maximum width as needed */
        white-space: normal;
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
                        <h1 class="m-0">Dashboard</h1>
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
                    <div class="col-1 mb-3 d-flex align-items-center" >
                        <a href="{{route('admin.post.create')}}" class="btn btn-block btn-primary ml-1">Add</a>
                        <a href="{{route('admin.post.edit', ["id"=>$element->id])}}">
                            <i class="fas fa-pencil-alt ml-3 text-success"></i>
                        </a>
                        <form action="{{route('admin.post.delete', ["id"=>$element->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="col-14">
                    <div class="card ">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 ">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Content</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->title}}</td>
                                        <td>{{$element->category->title}}</td>
                                        <td>
                                            @foreach($element->tags as $tag)
                                                {{$tag->title}}
                                                @if (!$loop->last)
                                                    , <!-- Add a comma if it's not the last tag -->
                                                @endif
                                            @endforeach
{{--                                        //alternativ:--}}
{{--                                        {{ implode(', ', $element->tags->pluck('title')->toArray()) }}--}}
                                        </td>
                                        <td class="content-cell"> {!! $element->content !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


