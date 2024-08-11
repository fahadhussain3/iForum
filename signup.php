<?php
include 'dbconnect.php';
?>

<!-- Modal -->
<div class="modal fade" id="SignupModal" tabindex="-1" aria-labelledby="SignupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SignupModal">SignUp to iForum </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="http://localhost/iForum/iForum/signup_handel.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password1" name="Password1">
                    </div>
                    <div class="mb-3">
                        <label for="Password2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="Password2" name="Password2">
                    </div>
                    <button type="submit" class="btn btn-primary">SignUp</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>