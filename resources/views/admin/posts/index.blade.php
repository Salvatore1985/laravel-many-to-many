@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('deleted-message'))
                    <div class="alert alert-warning">
                        {{ session('deleted-message') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post) }}"
                                        class="text-decoration-none text-black">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="d-flex ">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="btn btn-warning btn-sm me-3">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                        class="post-form-destroyer">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">There are no posts to show</td>
                            </tr>
                        @endforelse

                        @section('footer-scripts')
                            <script defer>
                                const deleteForms = document.querySelectorAll('.post-form-destroyer');
                                console.log(deleteForms);
                                deleteForms.forEach(singleForm => {
                                    singleForm.addEventListener('submit', function(event) {
                                        event.preventDefault(); // § blocchiamo l'invio del form
                                        userConfirmation = window.confirm(
                                            `Sei sicuro di voler eliminare ${this.getAttribute('post-title')}?`);
                                        if (userConfirmation) {
                                            this.submit();
                                        }
                                    })
                                });
                            </script>
                        @endsection
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
