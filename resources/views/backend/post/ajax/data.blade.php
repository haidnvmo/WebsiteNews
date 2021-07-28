@foreach ($getAllPost as $value)
<tr>
    <td>{{ $value->title }}</td>
    <td>{{ $value->categories->name }}</td>
    <td>{{ $value->description }}</td>
    <td>{!! $value->content !!}</td>
    <td><img src="{{ asset('storage/avatars/'.$value->image) }}" width="100px" alt=""></td>
    <td><a href="{{ route('post.edit',$value->id) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
    <td> <a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('post.delete',$value->id) }}"><button type="button" class="btn btn-success">Delete</button></a></td>
</tr>
@endforeach