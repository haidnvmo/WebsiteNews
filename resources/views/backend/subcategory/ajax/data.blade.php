@foreach ($subGetCategory as $value)
<tr>
    
    <td>{{ $value->name }}</td>
    <td>{{ $value->slug }}</td>
    <td>{{ $value->category->name }}</td>
    <td><a href="{{ route('subcategory.edit',$value->id) }}"><button type="button" class="btn btn-primary">Edit</button></a><br><a onclick="return confirm('Bạn có muốn xóa bài viết này không')" href="{{ route('subcategory.delete',$value->id) }}"><button type="button" class="btn btn-success">Delete</button></a></td>

</tr>
@endforeach