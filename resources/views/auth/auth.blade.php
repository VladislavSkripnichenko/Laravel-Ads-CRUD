<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('auth') }}">
            {{ csrf_field() }}
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="glyphicon glyphicon-user prefix grey-text"></i>
                        <input name="username" type="text" id="defaultForm-username" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-username">Your Username</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="glyphicon glyphicon-lock prefix grey-text"></i>
                        <input name='password' type="password" id="defaultForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your Password</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>