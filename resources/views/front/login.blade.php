<main>
  <form 
    action="{{ route('user.login_submit') }}" method="POST"
  >
    @csrf
    <div>
      <label for="email">Email:</label>
      <input 
        type="email" 
        name="email" 
        id="email"
        value="{{ old('email') }}" 
        required 
      />
    </div>
    <div>
      <label for="password">Password:</label>
      <input 
        type="password" 
        name="password" 
        id="password" 
        value="{{ old('password') }}"
        required 
      />
    </div>
    <button type="submit">Login</button>   
  </form>
  <p>No account</p> <span><a href="{{ route('user.register') }}">Sign up here</a></span>
</main>