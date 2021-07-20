<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <x-ux::link route="welcome" class="navbar-brand">
            <x-ux::icon name="rocket" color="primary"/>
            {{ config('app.name') }}
        </x-ux::link>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto">
                @guest
                    <x-ux::nav-link icon="sign-in-alt" :label="__('Login')" route="login"/>
                    <x-ux::nav-link icon="user-plus" :label="__('Register')" route="register"/>
                @else
                    <x-ux::nav-link icon="users" :label="__('Users')" route="users"/>

                    <x-ux::nav-dropdown icon="user-circle" :label="Auth::user()->name">
                        <x-ux::dropdown-item :label="__('Update Profile')" click="$emit('showModal', 'auth.profile-update')"/>
                        <x-ux::dropdown-item :label="__('Change Password')" click="$emit('showModal', 'auth.password-change')"/>
                        <x-ux::dropdown-item :label="__('Logout')" click="logout"/>
                    </x-ux::nav-dropdown>
                @endguest
            </div>
        </div>
    </div>
</nav>
