import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, election, candidates }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Result Election {election.Title}</h2>}
        >
            <Head title="Election" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <h1>Hasil Pemilihan</h1>
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
                                    <div>{candidate.result}</div>
                                    <h1>--------------------------------</h1>
                                </li>
                            ))}
                        </ul>

                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
