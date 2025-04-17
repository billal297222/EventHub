@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-gradient bg-primary text-white rounded-top-4 py-4">
                    <h3 class="mb-0 text-center"><i class="bi bi-calendar-plus me-2"></i>Create New Event</h3>
                </div>

                <div class="card-body p-5 bg-light">

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="bi bi-exclamation-circle-fill me-1"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Event Title</label>
                            <input type="text" name="title" class="form-control form-control-lg rounded-3" placeholder="Enter event name" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Describe the event..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Banner Image</label>
                            <input type="file" name="image" class="form-control rounded-3">
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Start Date</label>
                                <input type="date" name="start_date" class="form-control rounded-3">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">End Date</label>
                                <input type="date" name="end_date" class="form-control rounded-3">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Start Time</label>
                                <input type="time" name="start_time" class="form-control rounded-3">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">End Time</label>
                                <input type="time" name="end_time" class="form-control rounded-3">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" name="location" class="form-control rounded-3" placeholder="E.g., Central Park, NY">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Event Date <small class="text-muted">(for one-day events)</small></label>
                            <input type="date" name="event_date" class="form-control rounded-3">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Price (USD)</label>
                            <input type="number" name="price" class="form-control rounded-3" placeholder="e.g. 49.99" step="0.01" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm">
                                <i class="bi bi-save2 me-2"></i>Create Event
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
