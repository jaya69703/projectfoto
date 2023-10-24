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
            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.usermanage.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.usermanage.show', $item->id) }}" class="btn btn-outline-secondary btn-rounded"><i class="fa-solid fa-eye"></i></a>
                <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                    data-url="{{ route('admin.usermanage.destroy', $item->id) }}" data-name="{{ $item->name }}"
                    onclick="deleteData('{{ $item->id }}')">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
@endif
