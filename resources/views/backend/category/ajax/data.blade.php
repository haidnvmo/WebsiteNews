@foreach ($getCategory as $value)
<tr>
    <td>{{ $value->name }}</td>
    <td>{{ $value->slug }}</td>
    <td><a href="{{ route('category.edit',$value->id) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
    <td> <a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('category.delete',$value->id) }}"><button type="button" class="btn btn-success">Delete</button></a></td>
</tr>
@endforeach