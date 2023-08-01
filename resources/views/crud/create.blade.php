<form action="{{ route('crud.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="company" id=""><br />
    @error('company')
        {{ $message }}
    @enderror<br />
    <input type="text" name="model" id=""><br />
    @error('model')
        {{ $message }}
    @enderror<br />
    <input type="file" name="image" id=""><br />
    @error('image')
        {{ $message }}
    @enderror<br />

    <input type="submit" value="submit">
</form>