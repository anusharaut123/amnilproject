<x-app-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Posts') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <input type="text" id="success" value="{{ session('success')}}" readonly hidden>
    <input type="text" id="error" value="{{ session('error')}}" readonly hidden>
    <a href="{{route('post.create')}}" class="btn btn-primary">Create Post</a>

    <table id="postTable" class="table table-striped" style="width:70%">
        <thead>
            <th>SN</th>
            <th>Title</th>
            <th>Description</th>
        </thead>
        <tbody>
            @php
            $serialNumber = 1;
            @endphp
            @foreach ($posts as $post)
            <tr>
                <td>{{ $serialNumber++ }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td><a href="{{ route('post.edit',['postid' => $post->id]) }}" class="btn btn-primary mb-4">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>

<script>
        $(document).ready(function() {
        new DataTable('#postTable');
        if ($('#success').val() != '') {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: $('#success').val(),
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
</script>
