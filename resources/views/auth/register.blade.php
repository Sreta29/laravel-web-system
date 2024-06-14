<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5" onclick="togglePasswordVisibility('password', 'toggle-password-icon')">
                    <svg id="toggle-password-icon" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.033.071-.07.138-.107.208-.868 1.634-2.186 3.042-3.758 4.07C15.954 17.852 14.022 19 12 19c-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <span id="password-requirements" class="text-sm text-gray-600 dark:text-gray-400">Password must be at least 12 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</span>
            <span id="password-error" class="text-sm text-red-500 hidden">Invalid password. It must be at least 12 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</span>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5" onclick="togglePasswordVisibility('password_confirmation', 'toggle-password-confirmation-icon')">
                    <svg id="toggle-password-confirmation-icon" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.033.071-.07.138-.107.208-.868 1.634-2.186 3.042-3.758 4.07C15.954 17.852 14.022 19 12 19c-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function validateForm() {
            const isPasswordValid = validatePassword();
            const isICNumValid = validateICNum();
            return isPasswordValid && isICNumValid;
        }

        function validatePassword() {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const passwordRequirements = document.getElementById('password-requirements');
            const passwordError = document.getElementById('password-error');
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/;

            if (!regex.test(password)) {
                passwordRequirements.classList.add('text-red-500');
                passwordError.classList.remove('hidden');
                return false;
            } else {
                passwordRequirements.classList.remove('text-red-500');
                passwordError.classList.add('hidden');
            }

            if (password !== passwordConfirmation) {
                alert('Passwords do not match.');
                return false;
            }

            return true;
        }
        
        function togglePasswordVisibility(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            const isPasswordVisible = passwordField.type === 'text';

            passwordField.type = isPasswordVisible ? 'password' : 'text';
            icon.innerHTML = isPasswordVisible
                ? `<path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.033.071-.07.138-.107.208-.868 1.634-2.186 3.042-3.758 4.07C15.954 17.852 14.022 19 12 19c-4.477 0-8.268-2.943-9.542-7z" />`
                : `<path d="M13.875 18.825C14.42 18.942 14.994 19 15.579 19c3.325 0 6.106-1.612 7.933-4.194.073-.102.144-.203.213-.307.63-1.027.73-2.356.294-3.47A9.926 9.926 0 0 0 15.579 5.5c-.704 0-1.396.085-2.063.248l.343.342A9.926 9.926 0 0 1 21.222 12a9.924 9.924 0 0 1-3.86 4.194c-.167.102-.336.198-.506.288.017.042.036.083.054.124a7.828 7.828 0 0 0 .965 1.407zm3.04 1.748c-.195-.172-.385-.35-.57-.532a11.004 11.004 0 0 1-1.034-1.227 11.001 11.001 0 0 0-.486-.618c-.252-.284-.524-.558-.813-.83-.287-.269-.596-.533-.922-.79-.324-.256-.674-.506-1.045-.75-.373-.244-.756-.482-1.15-.714-.396-.231-.81-.455-1.24-.672-.429-.217-.874-.426-1.333-.625-.46-.199-.933-.39-1.42-.571-.484-.18-.982-.35-1.49-.507-.51-.157-1.034-.302-1.57-.434-.537-.132-1.086-.249-1.65-.353-.563-.104-1.14-.196-1.726-.27-.586-.073-1.18-.131-1.787-.176a12.19 12.19 0 0 0-1.906.002c-.64.04-1.284.11-1.928.206-.642.095-1.283.21-1.918.342-.636.13-1.266.275-1.89.435-.622.159-1.234.33-1.84.51a10.63 10.63 0 0 0-1.442.64c-.484.215-.955.45-1.406.7-.446.25-.883.524-1.303.822-.418.295-.824.617-1.208.96-.383.342-.744.71-1.084 1.101l.526.526a10.007 10.007 0 0 0 1.468 1.03c.518.311 1.045.6 1.577.864.532.264 1.07.51 1.612.737.54.228 1.083.437 1.63.627.545.189 1.092.357 1.643.505.548.148 1.098.275 1.65.38.55.105 1.1.192 1.65.26.55.067 1.1.114 1.65.141.552.027 1.106.042 1.66.042h.208a12.143 12.143 0 0 0 1.546-.109c.519-.045 1.037-.104 1.553-.172.517-.07 1.032-.154 1.543-.254.511-.1 1.017-.22 1.52-.356.501-.135.999-.289 1.49-.459.494-.168.982-.355 1.463-.556.481-.2.955-.42 1.42-.655.465-.235.92-.49 1.365-.765a9.949 9.949 0 0 0 2.118-1.854z" />`;
        }
    </script>
</x-guest-layout>




