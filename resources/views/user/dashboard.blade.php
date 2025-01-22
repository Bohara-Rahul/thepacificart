Hello {{ auth()->user()->name }}

<form action="{{ route('user.logout') }}" method="POST">
  @csrf
  <button type="submit">Logout</button>
</form>