import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, elections }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Election" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden sm:rounded-lg flex flex-col justify-center items-center">
                        <div className="p-6 text-gray-900 font-bold">
                            AVAILABLE ELECTION
                        </div>
                            
                            <div className='p-6'>
                                {auth.user.role === "admin" ?(
                                    <a href={route('election.add')}>ADD ELECTION</a>
                                ):(<div></div>)}

                                <h1>Daftar Election</h1>
                                <ul className=' flex flex-col gap-5'>
                                    {elections.map((election) => (
                                        <li key={election.id}>
                                            <li>Title <br></br> {election.Title}</li>
                                            <li>Desc  : {election.Description}</li>
                                            <li>Scope : {election.Scope}</li>
                                            <li>Jumlah pemilih terdaftar: {election.TotalVoter}</li>
                                            <a href={route('election.detail', {id:election.id})}>DETAIL</a>
                                        </li>
                                    ))}
                                </ul>
                            </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
