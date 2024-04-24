import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';


export default function index({ auth, data, candidates }) {
    
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
                        <div className="p-6 text-gray-900">{data.Title}</div>
                        <div className="p-6 text-gray-900">{data.Description}</div>
                        <div className="p-6 text-gray-900">{data.Result}</div>
                        <div className="p-6 text-gray-900">{data.Scope}</div>
                        <a href={route('candidate.add')}>Tambah Candidate</a>

                        {candidates.map((candidate) => (
                            <li key={candidate.id}>
                                {candidate.Photo && (
                                    <div>
                                        <img
                                            src={`/storage/${candidate.Photo}`}  // Menentukan URL yang benar
                                            alt={`Photo of ${candidate.Chairman}`}  // Teks alternatif
                                            className="w-24 h-24 object-cover"  // Pengaturan tampilan
                                        />
                                    </div>
                                )}
                                <li>{candidate.SerialNumber}</li>
                                <li>{candidate.Chairman}</li>
                                <li>{candidate.DeputyChairman}</li>
                                <li>{candidate.Vision}</li>
                                <li>{candidate.Mision}</li>
                                
                            </li>
                        ))}
                    </div>
                </div>
            </div>

            

        </AuthenticatedLayout>
    );
}
