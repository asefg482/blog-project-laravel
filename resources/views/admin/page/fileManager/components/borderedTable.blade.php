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
                            <th> file</th>
                            <th> preview</th>
                            <th> slug</th>
                            <th> description</th>
                            <th> action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $item)
                            <tr>
                                <td> {{$item['id']}}</td>
                                <td> {{$item['file']}}</td>
                                <td><a href="{{asset($item['file'])}}" target="_blank"><img src="{{asset($item['file'])}}" alt=""></a></td>
                                <td> {{$item['slug']}}</td>
                                <td>{{$item['description']}}</td>
                                <td>
                                    <form action="{{route('file-manager.destroy',$item['slug'])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a target="_blank" href="{{url(asset($item['file']))}}" class="btn btn-success">open file</a>
                                        <a target="_blank" href="{{route('file-manager.show',$item['slug'])}}" class="btn btn-success">open secure</a>
                                        <a   href="{{ route('file-manager.edit',$item['slug']) }}" class="btn btn-behance">edit</a>
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
