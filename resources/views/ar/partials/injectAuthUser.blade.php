@php
    $userId = Auth::id();
    $user = App\Models\User::find($userId);
@endphp
