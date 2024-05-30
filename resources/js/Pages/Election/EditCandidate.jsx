import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head , useForm} from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';

export default function Edit({ auth, elections,candidate }) {
    const { data, setData, post, processing, errors } = useForm({
        election_id: candidate.election_id,
        SerialNumber: candidate.SerialNumber,
        Chairman: candidate.Chairman,
        DeputyChairman: candidate.DeputyChairman,
        Vision: candidate.Vision,
        Mision: candidate.Mision,
        photo: null
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('candidate.update', {id: candidate.id}));
    };


    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Edit Candidate" />

            <div className="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
                <h1 className="text-2xl font-bold mb-6">Edit Candidate</h1>
                
                <form onSubmit={submit} className="space-y-6">

                    <div>
                        <label htmlFor="election_id" className="block text-sm font-medium text-gray-700">Election</label> 
                        <select 
                            id="election_id" 
                            name="election_id" 
                            value={data.election_id}
                            onChange={(e) => setData('election_id', e.target.value)}
                            required
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        >
                            <option value="" >Select Election</option>
                            {elections.map((election) => (
                                <option key={election.id} value={election.id}>{election.Title}</option>
                            ))}
                        </select>              
                    </div>

                    <div>
                        <InputLabel htmlFor="SerialNumber" value="SerialNumber" className="block text-sm font-medium text-gray-700" />

                        <TextInput
                            id="SerialNumber"
                            name="SerialNumber"
                            value={data.SerialNumber}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            autoComplete="SerialNumber"
                            isFocused={true}
                            onChange={(e) => setData('SerialNumber', e.target.value)}
                            required
                        />

                        <InputError message={errors.SerialNumber} className="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <InputLabel htmlFor="photo" value="Photo" className="block text-sm font-medium text-gray-700" />
                        <input
                            type="file"
                            name="photo"
                            id="photo"
                            accept="image/*" 
                            onChange={(e) => {
                                const file = e.target.files[0]; 
                                setData('photo', file ? file : null); 
                            }}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        />
                        <InputError message={errors.photo} className="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <InputLabel htmlFor="Chairman" value="Calon Ketua" className="block text-sm font-medium text-gray-700" />

                        <TextInput
                            id="Chairman"
                            name="Chairman"
                            value={data.Chairman}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            autoComplete="Chairman"
                            isFocused={true}
                            onChange={(e) => setData('Chairman', e.target.value)}
                            required
                        />

                        <InputError message={errors.Chairman} className="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <InputLabel htmlFor="DeputyChairman" value="Calon Wakil Ketua" className="block text-sm font-medium text-gray-700" />

                        <TextInput
                            id="DeputyChairman"
                            name="DeputyChairman"
                            value={data.DeputyChairman}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            autoComplete="DeputyChairman"
                            isFocused={true}
                            onChange={(e) => setData('DeputyChairman', e.target.value)}
                            required
                        />

                        <InputError message={errors.DeputyChairman} className="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <InputLabel htmlFor="Vision" value="Visi" className="block text-sm font-medium text-gray-700" />

                        <TextInput
                            id="Vision"
                            name="Vision"
                            value={data.Vision}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            autoComplete="Vision"
                            isFocused={true}
                            onChange={(e) => setData('Vision', e.target.value)}
                            required
                        />

                        <InputError message={errors.Vision} className="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <InputLabel htmlFor="Mision" value="Misi" className="block text-sm font-medium text-gray-700" />

                        <TextInput
                            id="Mision"
                            name="Mision"
                            value={data.Mision}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            autoComplete="Mision"
                            isFocused={true}
                            onChange={(e) => setData('Mision', e.target.value)}
                            required
                        />

                        <InputError message={errors.Mision} className="mt-2 text-sm text-red-600" />
                    </div>
                            
                    <div className="flex items-center justify-end mt-6">
                        <PrimaryButton className="ml-4" disabled={processing}>
                            EDIT
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>

    );
}
