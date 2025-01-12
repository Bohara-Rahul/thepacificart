<main>
  <form 
    action="{{ route('user.register_submit') }}" method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    <div>
      <label for="photo">Photo:</label>
      <input type="file" name="photo" id="photo" value="{{ old('photo') }}" />
    </div>
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" />
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="text" name="email" id="email" value="{{ old('email') }}"/>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="{{ old('password') }}" />
    </div>
    <div>
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" name="retype_password" id="confirm_password" />
    </div>
    <button type="submit">Sign up</button>   
  </form>
  <p>Already have an account</p> <span><a href="{{ route('user.login') }}">Login</a></span>
</main>