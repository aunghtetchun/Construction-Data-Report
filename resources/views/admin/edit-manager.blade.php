@extends('dashboard.app')

@section("title") Edit User @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "User " => route("admin.managerList"),
    ]])
        @slot("last") Edit User @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit User @endslot
                @slot('button')
                    <a href="{{route('admin.managerList')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('admin.updateManager',$user->id) }}">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updates --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                    </div>
        
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="number" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    </div>
        
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
        
                    <div class="form-group">
                        <label for="site_id">Site</label>
                        <select name="site_id" class="form-control" id="site_id" required>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}" @if($site->id == $user->site_id) selected @endif>{{ $site->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" value="{{ $user->address }}" required>
                    </div>
        
                    <input type="hidden" name="role" value="leader">
        
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
                @endslot
            @endcomponent
        </div>
       
                      

    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 140,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });



        });
    </script>
@endsection
