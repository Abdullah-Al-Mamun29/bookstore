@if(session('messages'))
@foreach(session('messages') as $message)
<div class="message alert alert-success d-flex justify-content-between" role="alert">
    <span>{{ $message }}</span>
    <i class="fas fa-times" style="cursor:pointer;" onclick="this.parentElement.remove();"></i>
</div>
@endforeach
@endif