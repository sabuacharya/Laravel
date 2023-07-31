<form action="{{ route('crud.store') }}" method="post">
    @csrf
    <input type="text" name="company" id=""><br />
    @error('company')
        {{ $message }}
    @enderror<br />
    <input type="text" name="model" id=""><br />
    @error('model')
        {{ $message }}
    @enderror<br />

    <input type="submit" value="submit">
</form>