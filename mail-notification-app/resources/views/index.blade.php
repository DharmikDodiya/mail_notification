<!DOCTYPE html>
<html lang="en">
<head>
  <title>MailNotification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Register form</h2>
  <form action="{{url('adduser')}}" method="post">
    @if (Session::has('success'))
        <span>{{Session::get('success')}}</span>
    @endif
        
    
    @csrf
    <div class="mb-3 mt-3">
        <label for="email">UserName</label>
        <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="name">
      </div>
      <span class="text-danger">
        @error('name')
            {{$message}}
        @enderror 
    </span>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <span class="text-danger">
      @error('email')
          {{$message}}
      @enderror 
    </span>

    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <span class="text-danger">
      @error('password')
          {{$message}}
      @enderror 
  </span>
    <div class="mb-3">
      <label for="pwd">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="Reenter password" name="password_confirmation">
    </div>
    <span class="text-danger">
      @error('password_confirmation')
          {{$message}}
      @enderror 
  </span>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
