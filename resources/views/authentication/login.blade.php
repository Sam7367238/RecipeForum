<x-layout title="Login">
    <h1>Login</h1>

    <x-forms.errors/>

    <form method="POST" action="{{ route('login.store') }}">
        @method("POST")
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password"> 
        </div>

        <input type="submit" value="Sign Up">
    </form>
</x-layout>