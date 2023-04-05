<form action={{route('register')}} class="register-form">
    @method('POST')
    @csrf

    <div class="form-content">
        <h2 class="headline-h2">Create Free Account 😌</h2>
        <div class="form-control">
            <label for="" class="form-input-label">Email</label>
            <div class="form-input-wrapper">
                <input type="email" name="email" placeholder="example@mail.com" id="email">
            </div>
        </div>
        <div class="form-control">
            <label for="" class="form-input-label">Password</label>
            <div class="form-input-wrapper">
                <input type="password" placeholder="password" name="password" id="password">
            </div>
        </div>
        <div class="form-control">
            <label for="" class="form-input-label">Confirm password</label>
            <div class="form-input-wrapper">
                <input type="password" placeholder="confirm password" name="confirmed" id="confirmed">
            </div>
        </div>

        <div class="form-control">
            <div class="form-input-wrapper">
                <input type="submit" value="register" name="register" id="register">
            </div>
        </div>



    </div>
</form>
