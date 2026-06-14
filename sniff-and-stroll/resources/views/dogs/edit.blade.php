<h1>Edit Dog</h1>

<form method="POST" action="{{ route('dogs.update', $dog) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $dog->name }}">
    <input name="breed" value="{{ $dog->breed }}">
    <textarea name="notes">{{ $dog->notes }}</textarea>

    <button>Update</button>
</form>
