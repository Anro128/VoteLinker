import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head , useForm} from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import React, { useState } from 'react';

export default function Edit({ auth,election }) {
    const { data, setData, post, processing, errors } = useForm({
        title: election.Title,
        description: election.Description,
        scope: election.Scope,
        isopen: election.IsOpen,
        ispublic: election.IsPublicResult,
    });

    const updateOpen = () => {
        setData('isopen', !data.isopen); // Toggle the state
    };

    const updatePublic = () => {
        setData('ispublic', !data.ispublic); // Toggle the state
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('election.update', {id:election.id}));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Edit Election" />
            
            <form onSubmit={submit} className='mx-[100px] px-[45px] flex flex-col gap-5 h-[77vh] justify-center'>
                <div>
                    <InputLabel htmlFor="title" value="Title" />

                    <TextInput
                        id="title"
                        name="title"
                        value={data.title}
                        className="mt-1 block w-full"
                        autoComplete="title"
                        isFocused={true}
                        onChange={(e) => setData('title', e.target.value)}
                        required
                    />

                    <InputError message={errors.title} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="description" value="Description" />

                    <TextInput
                        id="description"
                        name="description"
                        value={data.description}
                        className="mt-1 block w-full"
                        autoComplete="description"
                        isFocused={true}
                        onChange={(e) => setData('description', e.target.value)}
                        required
                    />

                    <InputError message={errors.description} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="scope" value="Scope" />

                    <TextInput
                        id="scope"
                        name="scope"
                        value={data.scope}
                        className="mt-1 block w-full"
                        autoComplete="scope"
                        isFocused={true}
                        onChange={(e) => setData('scope', e.target.value)}
                        required
                    />

                    <InputError message={errors.scope} className="mt-2" />
                </div>

                <div>
                    <button type="button" onClick={updateOpen}>
                        {data.isopen ? 'ELECTION OPEN' : 'ELECTION CLOSE'}
                    </button>
                </div>

                <div>
                    <button type="button" onClick={updatePublic}>
                        {data.ispublic ? 'RESULT PUBLIC' : 'RESULT PRIVATE'}
                    </button>
                </div>
                
            
                <div className="flex items-center justify-end mt-4">
                    

                    <PrimaryButton className="ms-4" disabled={processing}>
                        EDIT
                    </PrimaryButton>
                </div>
            </form>
            
        </AuthenticatedLayout>
    );
}
