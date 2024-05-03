import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, regists }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Registran</h2>}
        >
            <Head title="Election" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">Lihat regsitran</div>
                        <ul>

                            {regists.map((regist) => (
                                <li key={regist.id}>
                                    <li>{regist.name}</li>
                                    <li>{regist.email}</li>
                                    <li>{regist.NIM}</li>
                                    <li>{regist.fakultas}</li>
                                    <li>{regist.departemen}</li>
                                    {regist.KTM && (
                                        <div>
                                            <img
                                                src={`/storage/${regist.KTM}`} 
                                                alt={`${regist.NIM}`} 
                                                className="w-24 h-24 object-cover" 
                                            />
                                        </div>
                                    )}

                                    <a href={route('regist.del', {id:regist.id})}>DELETE</a>
                                    <a href={route('regist.acc', {id:regist.id})}>ACC</a>

                                </li>
                            ))}

                        </ul>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
