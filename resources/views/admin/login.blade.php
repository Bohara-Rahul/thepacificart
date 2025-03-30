<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite('resources/css/app.css')

  <title>Admin | Login</title>
</head>
<body>
  <section class="container flex flex-col justify-center items-center">
    <h2>Admin Login</h2>
    <form action="{{ route('admin_login_submit') }}" method="POST">
      @csrf
        <label for="email">Email:</label>
        <input
          id="email"
          type="email" 
          name="email"
          placeholder="Enter your email here" 
          value='{{ old("email") }}'
        />

        <label for="password">Password:</label>
        <input
          id="password"
          type="password"
          name="password"
          placeholder="Enter your passsword here"
          value='{{ old("password") }}'
        />

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </section> 
</body>
</html>
  


