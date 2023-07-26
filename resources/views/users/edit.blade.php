<form action="{{ route('user.update', $user->id) }}" method="POST">
  @csrf
  @method('PUT')
  <label for="fname">Name:</label><br>  
  <input type="text" id="fname" name="name" value="{{ $user->name }}"><br>
  <label for="lname">Email:</label><br>
  <input type="text" id="lname" name="email" value="{{ $user->email }}"><br><br>
  <label for="password">Password:</label><br>  
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Submit">
</form>