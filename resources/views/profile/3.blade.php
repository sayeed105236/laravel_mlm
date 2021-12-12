<form class="validate-form" submit="updatePassword">
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label for="account-old-password">Old Password</label>
                <div class="input-group form-password-toggle input-group-merge">
                    <input type="password" class="form-control" id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label for="account-new-password">New Password</label>
                <div class="input-group form-password-toggle input-group-merge">
                    <input type="password" class="form-control" id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label for="account-retype-new-password">Retype New Password</label>
                <div class="input-group form-password-toggle input-group-merge">
                    <input type="password" class="form-control" id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">

            <button submit="updatePassword" class="btn btn-primary mr-1 mt-1">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
        </div>
    </div>
</form>
