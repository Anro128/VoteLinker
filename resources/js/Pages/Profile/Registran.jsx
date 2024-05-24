import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, regists }) {
    
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Election" />

            <div className="py-12 ">
                <div className="max-w-7xl min-h-2xl mx-auto sm:px-6 lg:px-8 ">
                    <div className="bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-white flex justify-center font-bold text-xl bg-[#282D56] rounded-t-md">Registered Accounts</div>
                        <table className='min-w-full divide-y divide-gray-200'>
                            <thead className='bg-gray-50'>
                                <tr>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Name</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Email</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>NIM</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Fakultas</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Departemen</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>KTM</th>
                                    <th className='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Actions</th>
                                </tr>
                            </thead>
                            <tbody className='bg-white divide-y divide-gray-200'>
                                {regists.map((regist) => (
                                    <tr key={regist.id} className='hover:bg-gray-100'>
                                        <td className='px-6 py-4 whitespace-nowrap'>{regist.name}</td>
                                        <td className='px-6 py-4 whitespace-nowrap'>{regist.email}</td>
                                        <td className='px-6 py-4 whitespace-nowrap'>{regist.NIM}</td>
                                        <td className='px-6 py-4 whitespace-nowrap'>{regist.fakultas}</td>
                                        <td className='px-6 py-4 whitespace-nowrap'>{regist.departemen}</td>
                                        <td className='px-6 py-4 whitespace-nowrap'>
                                            {regist.KTM && (
                                                <div className='relative group'>
                                                    <img
                                                        src={`/storage/${regist.KTM}`} 
                                                        alt={`${regist.NIM}`} 
                                                        className='max-w-[120px] min-w-[120px] h-24 object-cover' 
                                                    />
                                                    <div className='absolute top-0 left-0 hidden w-80 h-80 bg-white border border-gray-300 shadow-lg group-hover:flex group-hover:z-50 justify-center items-center'>
                                                        <img
                                                            src={`/storage/${regist.KTM}`} 
                                                            alt={`${regist.NIM}`} 
                                                            className='max-w-full max-h-full object-contain' 
                                                        />
                                                    </div>
                                                </div>
                                            )}
                                        </td>
                                        <td className='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                                            <div className='flex flex-col gap-2 items-center'>
                                                <a href={route('regist.del', {id: regist.id})} className='text-red-600 hover:text-red-900'>DELETE</a>
                                                <a href={route('regist.acc', {id: regist.id})} className='text-green-600 hover:text-green-900'>ACC</a>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
