import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        NIM:'',
        KTM:'',
        fakultas:'',
        departemen:'',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('registertemp'));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="name" value="Name" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        required
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="NIM" value="NIM" />

                    <TextInput
                        id="NIM"
                        name="NIM"
                        value={data.NIM}
                        className="mt-1 block w-full"
                        autoComplete="NIM"
                        isFocused={true}
                        onChange={(e) => setData('NIM', e.target.value)}
                        required
                    />

                    <InputError message={errors.NIM} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="fakultas" value="fakultas" />

                    <TextInput
                        id="fakultas"
                        name="fakultas"
                        value={data.fakultas}
                        className="mt-1 block w-full"
                        autoComplete="fakultas"
                        isFocused={true}
                        onChange={(e) => setData('fakultas', e.target.value)}
                        required
                    />

                    <InputError message={errors.fakultas} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="departemen" value="departemen" />

                    <TextInput
                        id="departemen"
                        name="departemen"
                        value={data.departemen}
                        className="mt-1 block w-full"
                        autoComplete="departemen"
                        isFocused={true}
                        onChange={(e) => setData('departemen', e.target.value)}
                        required
                    />

                    <InputError message={errors.departemen} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        required
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        required
                    />

                    <InputError message={errors.password_confirmation} className="mt-2" />
                </div>
                
                <div>
                    <InputLabel htmlFor="KTM" value="KTM" />
                    <input
                        type="file"
                        name="KTM"
                        id="KTM"
                        onChange={(e) => setData('KTM', e.target.files[0])}  // Tangani perubahan file
                    />
                    <InputError message={errors.KTM} className="mt-2" />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link
                        href={route('login')}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
