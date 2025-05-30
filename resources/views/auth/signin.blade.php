<!DOCTYPE html>
<html lang="en">
<head>
    <x-admin-header-css></x-admin-header-css>
</head>
<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                        <p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                                    </div>
                                    <div class="login-separater text-center mb-4">
                                        <span>SIGN IN WITH EMAIL</span>
                                        <hr/>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" id="formSubmit" data-parsley-validate>
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="authentication-forgot-password.html">Forgot Password?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
 <x-admin-footer-js></x-admin-footer-js>
    <!-- Inclusion des dépendances -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <x-admin-footer-js></x-admin-footer-js>

    <!-- Script pour gérer la soumission du formulaire -->
    <script>
        $('#formSubmit').submit(function(e) {
            e.preventDefault();
            if ($('#formSubmit').parsley().validate()) {
                var url = "{{ url('login_user') }}";
                $.ajax({
                    url: url,
                    data: $('#formSubmit').serialize(),
                    type: 'post',
                    success: function(result) {
                        if (result && result.status === 200) {
                        
                           window.location.href = result.url;
                        } else {
                            alert('Wrong Credentials');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            } else {
                alert('Error Occurred');
            }
        });
    </script>
</body>
</html>