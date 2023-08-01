<form action="{{ route('crud.update', $crud) }}" method="post" enctype="multipart/form-data">
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
    <img src="{{ asset('site/Upload/'. $crud->image) }}" style="width: 200px;">
    <input type="file" name="image" id=""><br />
    @error('image')
        {{ $message }}
    @enderror<br />

    <input type="submit" value="submit">
</form>