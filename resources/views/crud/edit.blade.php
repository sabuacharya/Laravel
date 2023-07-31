<form action="{{ route('crud.update', $crud) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="company" id="" value="{{ $crud->company }}"><br />
    @error('company')
        {{ $message }}
    @enderror<br />
    <input type="text" name="model" id="" value="{{ $crud->model }}"><br />
    @error('model')
        {{ $message }}
    @enderror<br />

    <input type="submit" value="submit">
</form>