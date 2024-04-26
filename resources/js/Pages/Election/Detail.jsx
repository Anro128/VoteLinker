import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function ElectionDetails({ auth, election, candidates, finish }) {
    const { data, setData, post, processing, errors } = useForm({
        idElection: election.id,
        idCandidate: ''
    });

    const submitVote = () => {
        post(route('election.vote'));
    };

    const handleVote = (candidateId) => {
        setData('idElection', data.id); 
        setData('idCandidate', candidateId);
    };

    

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Election</h2>}
        >
            <Head title="Election" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">DETAIL ELECTION</div>
                        <div className="p-6 text-gray-900">{election.Title}</div>
                        <div className="p-6 text-gray-900">{election.Description}</div>
                        <div className="p-6 text-gray-900">{election.Result}</div>
                        <div className="p-6 text-gray-900">{election.Scope}</div>

                        {auth.user.role === "admin" ?(
                            <div>
                            <a href={route('election.edit')}>Edit Election</a>
                            <a href={route('candidate.add')}>Tambah Candidate</a>
                            </div>
                        ):(<div></div>)}

                        <ul>
                            {candidates.map((candidate) => (
                                <li key={candidate.id}>
                                    {candidate.Photo && (
                                        <div>
                                            <img
                                                src={`/storage/${candidate.Photo}`} 
                                                alt={`${candidate.Chairman}`} 
                                                className="w-24 h-24 object-cover" 
                                            />
                                        </div>
                                    )}
                                    <div>{candidate.SerialNumber}</div>
                                    <div>{candidate.Chairman}</div>
                                    <div>{candidate.DeputyChairman}</div>
                                    <div>{candidate.Vision}</div>
                                    <div>{candidate.Mision}</div>

                                    {finish === false ?(
                                    <PrimaryButton
                                        onClick={() => {
                                            handleVote(candidate.SerialNumber);
                                        }}
                                    >
                                        Vote
                                    </PrimaryButton>
                                    ):(<div></div>)}

                                </li>
                            ))}
                        </ul>

                        {finish === false ?(
                            <PrimaryButton onClick={submitVote} disabled={processing}>
                                Submit Vote
                            </PrimaryButton>
                         ):(<div></div>)}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
