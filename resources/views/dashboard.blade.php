{{-- @extends('layouts.app')
@section('content')
<h2>User Dashboard</h2>
<p>Welcome, {{ Auth::user()->name }}!</p>
@endsection

 --}}

 @extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    {{-- User Image --}}
                    <div class="mb-4">
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                 alt="User Image"
                                 class="rounded-circle shadow-sm"
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <img src="https://i.ibb.co/2nF8b6Z/default-user.png"
                                 alt="Default User"
                                 class="rounded-circle shadow-sm"
                                 style="width: 120px; height: 120px; object-fit: cover;">
                        @endif
                    </div>

                    {{-- User Info --}}
                    <h3 class="mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-muted mb-2">{{ Auth::user()->email }}</p>

                    @if(Auth::user()->bio)
                        <p class="text-secondary px-3">{{ Auth::user()->bio }}</p>
                    @else
                        <p class="text-secondary">No bio added yet.</p>
                    @endif

                    <a href="#" class="btn btn-outline-primary mt-3">Edit Profile</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
