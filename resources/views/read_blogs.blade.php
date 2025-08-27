@include('/layouts/head')
    <div class="d-flex justify-content-center align-content-center">
        <table class="table w-90 p-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->content}}</td>
                        <td>
                            <img src="{{asset('storage/'.$blog->image_path)}}" alt="image" width="50" height="50">
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-warning" href="{{route('update_blog', ['id' => $blog->id])}}">Update</a>
                             <form action="{{route('delete_blog', ['id' => $blog->id])}}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <a href="{{route('dashboard')}}">Back</a>
        </table>
    </div>
@include('layouts.footer')
