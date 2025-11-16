<x-layout title="Register">
    <h1>Register</h1>

    <x-forms.errors/>

    <form method="POST" action="{{ route('register.store') }}">
        @method("POST")
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        
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