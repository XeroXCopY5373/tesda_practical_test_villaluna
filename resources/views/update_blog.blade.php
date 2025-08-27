@include('layouts.head')
    <a href="{{route('read_blogs')}}">Back</a>

    <div class="d-flex justify-content-center align-content-center">
            <form class="card w-50 p-3" action="{{route('update_blog_process', ['id' => $blogs->id])}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value={{$blogs->id}}>

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value={{$blogs->title}}>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <input type="text" class="form-control" id="content" name="content" placeholder="Enter Content" value={{$blogs->content}}>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" id="image_path" name="image_path" placeholder="Enter Image" value={{$blogs->image_path}}>
            </div>
            <button class="m-5 btn btn-primary" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@include('layouts.footer')
