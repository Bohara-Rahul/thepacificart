@extends('admin.layout.admin-layout')
@section('main_content')
    @include('admin.layout.sidebar')
    <section>
        <h2>Create New Blog</h2>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Content:</label>
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>

            <button type="submit">Save</button>
        </form>


        <!-- validation errors -->
        @if ($errors->any())
            <ul class="max-w-2xl px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <script>
        document.addEventListener("trix-attachment-add", function(event) {
            let attachment = event.attachment;
            if (attachment.file) {
                let formData = new FormData();
                formData.append("image", attachment.file);
                formData.append("_token", document.querySelector('meta[name="csrf-token"]').content);

                fetch("{{ route('trix.upload') }}", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.url) {
                            attachment.setAttributes({
                                url: data.url,
                                href: data.url
                            });
                        }
                    })
                    .catch(() => console.error("Upload failed"));
            }
        });
    </script>
@endsection
