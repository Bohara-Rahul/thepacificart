@include('admin.layout.admin-layout')
@section('main_content')
@include('admin.layout.sidebar')
<form action="{{ route('admin_hero_edit_submit', $hero->id) }}" method="POST">
  @csrf
  @method('PUT')
  <label for="slogan">Slogan:</label>
  <input type="text" name="slogan" value="{{ $hero->slogan }}" />

  <label for="content">Content:</label>
  <textarea type="text" name="content">{{ $hero->content }}</textarea>

  <button type="submit">Update</button>
</form>
@endsection

