Formularrio para crear una carta

<form action="{{url ('/carta')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('carta.form')
</form>