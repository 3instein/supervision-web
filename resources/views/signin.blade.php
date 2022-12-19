<form action="/signin" method="POST">
    @csrf
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Sign In">
</form>