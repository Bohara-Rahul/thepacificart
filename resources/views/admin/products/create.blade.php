<form action="{{ route('admin_products_create_submit') }}" method="POST">
  @csrf
  <div>
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') }}" required />
  </div>
  <div>
    <label for="description">Description</label>
    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
  </div>
  <div>
    <label for="price">Price</label>
    <input type="number" name="price" value="{{ old('price') }}" step=".01" required />
  </div>
  <div>
    <label for="medium">Medium</label>
    <input type="text" name="medium" value="{{ old('medium') }}" required />
  </div>
  <div>
    <label for="surface">Surface</label>
    <input type="text" name="surface" value="{{ old('surface') }}" required />
  </div>
  <div>
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="{{ old('stock') }}" required />
  </div>
  <div>
    <label for="size">Size</label>
    <input type="text" name="size" value="{{ old('size') }}" required />
  </div>
  <div>
    <label for="year_of_creation">Year of Creation</label>
    <input type="text" name="year_of_creation" value="{{ old('year_of_creation') }}" required />
  </div>
  <button type="submit">Create</button>
</form>