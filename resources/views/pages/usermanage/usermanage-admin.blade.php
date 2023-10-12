@if(Str::is('admin/usermanage/admin', request()->path()))
<tbody>
    @foreach ($admin as $key => $item)
    <tr>
        <td class="text-center">{{ ++$key }}</td>
        <td>{{ $item->name }}</td>
        <td class="text-center">{{ $item->phone }}</td>
        <td class="text-center">
            @if($item->isverify === 0)
            <span class="badge badge-danger">Belum Verify</span>
            @elseif($item->isverify === 1)
            <span class="badge badge-success">Sudah Verify</span>
            @endif
        </td>
        <td class="text-center d-flex justify-content-center align-items-center">
            <a  href="{{ route('admin.usermanage.user.show', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                <i class="fa-solid fa-eye"></i>
            </a>
            @if($item->type == 'User')
            <a  href="#" data-bs-toggle="modal" data-bs-target="#editUser{{$item->id}}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                <i class="fa-solid fa-edit"></i>
            </a>
            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.usermanage.user.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                    data-url="{{ route('admin.usermanage.user.destroy', $item->id) }}" data-name="{{ $item->name }}"
                    onclick="deleteData('{{ $item->id }}')">
                    <i class="fa-solid fa-trash-can"></i>
                 </a>
            </form>
            @else
            <a  href="{{ route('admin.usermanage.user.edit', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                <i class="fa-solid fa-edit"></i>
            </a>
            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.usermanage.worker.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                    data-url="{{ route('admin.usermanage.worker.destroy', $item->id) }}" data-name="{{ $item->name }}"
                    onclick="deleteData('{{ $item->id }}')">
                    <i class="fa-solid fa-trash-can"></i>
                 </a>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
@endif
