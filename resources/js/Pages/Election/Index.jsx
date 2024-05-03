import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, elections }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Election</h2>}
        >
            <Head title="Election" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">INI MENU ELECTION</div>

                        {auth.user.role === "admin" ?(
                            <a href={route('election.add')}>ADD ELECTION</a>
                        ):(<div></div>)}

                        <h1>Daftar Election</h1>
                        <ul>
                            {elections.map((election) => (
                                <li key={election.id}>
                                    <li>Title: {election.Title}</li>
                                    <li>Desc: {election.Description}</li>
                                    <li>Scope: {election.Scope}</li>
                                    <li>Jumlah pemilih terdaftar: {election.TotalVoter}</li>
                                    <a href={route('election.detail', {id:election.id})}>DETAIL</a>
                                </li>
                            ))}
                        </ul>

                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
