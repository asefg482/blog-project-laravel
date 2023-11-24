<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>
                <p class="card-description">
                    {{$description}}
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> title</th>
                            <th> slug</th>
                            <th> image</th>
                            <th> action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $item)
                            <tr>
                                <td> {{$item['id']}}</td>
                                <td> {{$item['title']}}</td>
                                <td> {{$item['slug']}}</td>
                                <td>
                                    <a href="{{route('file-manager.show',$item['image'])}}" target="_blank"><img src="{{route('file-manager.show',$item['image'])}}" alt=""></a>
                                </td>
                                <td>
                                    <form action="{{route('blog.destroy',$item['slug'])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a target="_blank" href="{{url('/single/'.$item['slug'])}}" class="btn btn-success">open</a>
                                        <a   href="{{ route('blog.edit',$item['slug']) }}" class="btn btn-behance">edit</a>
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
