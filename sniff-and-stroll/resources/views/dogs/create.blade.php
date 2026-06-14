<h1>Add Dog</h1>

<form method="POST" action="{{ route('dogs.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Name">

    <input type="text" name="breed" placeholder="Breed">

    <input type="number" name="age" placeholder="Age">

    <textarea name="notes" placeholder="Notes"></textarea>

    <button type="submit">Save Dog</button>
</form>
