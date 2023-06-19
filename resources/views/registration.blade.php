@extends('layout')

@section('title', 'Registration')

@section('content')
<div class="container">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- Name field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- Email field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div id="emailValidationMsg" class="invalid-feedback"></div>
        </div>
        <!-- Contact No. field -->
        <div class="mb-3">
            <label for="contact_no" class="form-label">Contact No.</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
        </div>
        <!-- Home Address field -->
        <div class="mb-3">
            <label for="home_address" class="form-label">Home Address</label>
            <input type="text" class="form-control" id="home_address" name="home_address" required>
        </div>
        <!-- Password field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- Confirm Password field -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    const emailInput = document.getElementById('email');
    const emailValidationMsg = document.getElementById('emailValidationMsg');

    emailInput.addEventListener('input', function () {
        if (emailInput.validity.valid) {
            emailValidationMsg.textContent = '';
            emailValidationMsg.classList.remove('is-invalid');
        } else {
            showEmailErrorMessage();
        }
    });

    function showEmailErrorMessage() {
        if (emailInput.validity.valueMissing) {
            emailValidationMsg.textContent = 'Email is required.';
        } else if (emailInput.validity.typeMismatch) {
            emailValidationMsg.textContent = 'Please enter a valid email address.';
        }
        emailValidationMsg.classList.add('is-invalid');
    }
</script>

@endsection
