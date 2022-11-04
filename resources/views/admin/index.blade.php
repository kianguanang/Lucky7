@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'List Users')

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">@yield('title')</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('admin.destroy', $user) }}" method="post" id="delete-item">
                                            <a href="{{ route('admin.edit', $user) }}" class="on-default edit-row"><i class="fas fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:document.getElementById('delete-item').submit();" class="on-default remove-row"><i class="far fa-trash-alt"></i></a>
{{--                                            <button type="submit">Delete</button>--}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
