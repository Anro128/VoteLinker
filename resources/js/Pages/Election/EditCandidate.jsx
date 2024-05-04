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
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Add Candidate</h2>}
        >
            <Head title="Edit Candidate" />
            
            <form onSubmit={submit}>

                <div>
                    <label for="election_id">Election</label> 
                    <select 
                    id="election_id" 
                    name="election_id" 
                    value={data.election_id}
                    onChange={(e) => setData('election_id', e.target.value)}
                    required>
                    <option value="" >Select Election</option>
                        {elections.map((election) => (
                            <option key={election.id} value={election.id} >{election.Title}</option>
                        ))}
                    </select>              
                </div>

                <div>
                    <InputLabel htmlFor="SerialNumber" value="SerialNumber" />

                    <TextInput
                        id="SerialNumber"
                        name="SerialNumber"
                        value={data.SerialNumber}
                        className="mt-1 block w-full"
                        autoComplete="SerialNumber"
                        isFocused={true}
                        onChange={(e) => setData('SerialNumber', e.target.value)}
                        required
                    />

                    <InputError message={errors.SerialNumber} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="photo" value="Photo" />
                    <input
                        type="file"
                        name="photo"
                        id="photo"
                        accept="image/*" 
                        onChange={(e) => {
                            const file = e.target.files[0]; 
                            setData('photo', file ? file : null); 
                        }}
                    />
                    <InputError message={errors.photo} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="Chairman" value="Calon Ketua" />

                    <TextInput
                        id="Chairman"
                        name="Chairman"
                        value={data.Chairman}
                        className="mt-1 block w-full"
                        autoComplete="Chairman"
                        isFocused={true}
                        onChange={(e) => setData('Chairman', e.target.value)}
                        required
                    />

                    <InputError message={errors.Chairman} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="DeputyChairman" value="Calon Wakil Ketua" />

                    <TextInput
                        id="DeputyChairman"
                        name="DeputyChairman"
                        value={data.DeputyChairman}
                        className="mt-1 block w-full"
                        autoComplete="DeputyChairman"
                        isFocused={true}
                        onChange={(e) => setData('DeputyChairman', e.target.value)}
                        required
                    />

                    <InputError message={errors.DeputyChairman} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="Vision" value="Visi"/>

                    <TextInput
                        id="Vision"
                        name="Vision"
                        value={data.Vision}
                        className="mt-1 block w-full"
                        autoComplete="Vision"
                        isFocused={true}
                        onChange={(e) => setData('Vision', e.target.value)}
                        required
                    />

                    <InputError message={errors.Vision} className="mt-2" />
                </div>

                <div>
                    <InputLabel htmlFor="Mision" value="Misi"/>

                    <TextInput
                        id="Mision"
                        name="Mision"
                        value={data.Mision}
                        className="mt-1 block w-full"
                        autoComplete="Mision"
                        isFocused={true}
                        onChange={(e) => setData('Mision', e.target.value)}
                        required
                    />

                    <InputError message={errors.Mision} className="mt-2" />
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
