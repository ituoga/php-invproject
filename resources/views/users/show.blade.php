<!-- resources/views/users/show.blade.php -->

<x-app-layout>

@section('content')
<h1>User Details</h1>

<div class="card">
    <div class="card-header">
        <h2>{{ $user->name }}</h2>
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone }}</p>
        <p><strong>Company Name:</strong> {{ $user->company_name }}</p>
        <p><strong>Company Code:</strong> {{ $user->company_code }}</p>
        <p><strong>Company Person:</strong> {{ $user->company_person }}</p>
        <p><strong>Address:</strong> {{ $user->address }}</p>
        <p><strong>City:</strong> {{ $user->city }}</p>
        <p><strong>Country:</strong> {{ $user->country }}</p>
        <p><strong>Is Client:</strong> {{ $user->is_client ? 'Yes' : 'No' }}</p>
        <p><strong>Is Worker:</strong> {{ $user->is_worker ? 'Yes' : 'No' }}</p>
        <p><strong>Is Manager:</strong> {{ $user->is_manager ? 'Yes' : 'No' }}</p>
        <p><strong>Is Admin:</strong> {{ $user->is_admin ? 'Yes' : 'No' }}</p>
        <p><strong>Worker Category:</strong> {{ $user->workerCategory->name ?? 'N/A' }}</p>
    </div>
</div>
</x-app-layout>
