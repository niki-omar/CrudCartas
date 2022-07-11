
<form action="{{url('/carta/'.$carta->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('carta.form');
</form>