@extends('dashboard.app')

@section("title") Add User @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "User " => route("admin.managerList"),
    ]])
        @slot("last") Add User @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add User @endslot
                @slot('button')
                    <a href="{{route('admin.managerList')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('admin.storeManager') }}">
                    @csrf
        
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
        
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="number" name="email" class="form-control" id="email" required>
                    </div>
        
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" required>
                    </div>
        
                    <div class="form-group">
                        <label for="site_id">Site</label>
                        <select name="site_id" class="form-control" id="site_id" required>
                            <option value="" selected disabled>Site ရွေးပါ</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" required>
                    </div>
        
                    <input type="hidden" name="role" value="manager">
        
                    <button type="submit" class="btn btn-primary">Create User</button>
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
